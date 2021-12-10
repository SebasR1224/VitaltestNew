<?php

namespace App\Http\Controllers;

use App\Models\Enfermedad;
use App\Models\Imc;
use App\Models\ParteCuerpo;
use App\Models\Recomendacion;
use App\Models\Sintoma;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index(){
        $contraindicaiones = Enfermedad::all();
        $partes = ParteCuerpo::all();
        $sintomas = Sintoma::all();
        return view('tests.index', compact('contraindicaiones', 'partes', 'sintomas'));
    }

    public function resultados(Request $request){
    $sexo = $request->input('sexo');
    $edad = $request->input('edad');
    $imc = $request->input('imc');
    $contraindicaiones = $request->input('contraindicaiones');
    $parte = $request->input('parte');
    $symptoms = $request->input('sintomas');

    $intensidad = $request->input('intensidad');

    // return dd($sexo, $edad, $imc, $contraindicaiones, $parte, $sintomas, $intensidad) ;

    foreach ($symptoms as $sintoma){
        $results = Recomendacion::where('status', '1')
        ->where('parte_id', $parte)
        ->where('imc_id', '!=', $imc)
        ->where('intensidad', $intensidad)
        ->where('sexo', $sexo)
        ->whereRaw("?  BETWEEN edadMin AND edadMax", [$edad])
        ->join('recomendacion_sintoma as reco'.$sintoma, 'recomendacions.id' , '=', 'reco'.$sintoma.'.recomendacion_id')
        ->join('sintomas as sinto'.$sintoma, 'sinto'.$sintoma.'.id', '=', 'reco'.$sintoma.'.sintoma_id')
        ->where('sinto'.$sintoma.'.id',  $sintoma)
        ->where(function($query) use($contraindicaiones){
            if($contraindicaiones != null){
                $query->whereHas("enfermedades", function($query) use($contraindicaiones){
                    $query->whereNotIn("enfermedads.id", $contraindicaiones)
                    ->orWhereNull('enfermedads.id');
                });
            }
        })

        ->first('recomendacions.id');
    };

    $count = $results->count();
    $num = Recomendacion::all()->count();
    $nombreImc = Imc::find($imc);
    if($count>0){
        $recomendacion = Recomendacion::find($results->id);
        return view('tests.results', compact('recomendacion','num','nombreImc', 'sexo', 'edad', 'imc', 'contraindicaiones', 'parte', 'symptoms', 'intensidad'));
    }else{
        alert('paila');
        return view('tests.results', compact('results','num', 'sexo', 'edad', 'imc', 'contraindicaiones', 'parte', 'symptoms', 'intensidad'));
    }

    }
}
