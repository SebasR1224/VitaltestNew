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


        $num = Recomendacion::all()->count();
        $nombreImc = Imc::find($imc);

        if(!$results){
            alert()->error('<h4 class="text-danger font-weight-light font-size-30">Sin resultados<h4>','<p class="font-weight-light">Analizámos <strong class="text-dark">' .$num. '+</strong> registros y ninguno coincide con su malestar,<span class="text-success"> por favor intente nuevamente</span>.</p>')
            ->showConfirmButton('Aceptar', '#00c9a7')
            ->toHtml()
            ->autoClose(10000);;

            return redirect()->route('test.index');
        }else{
            $recomendacion = Recomendacion::find($results->id);
            alert()->success('<h4 class="text-success font-weight-light font-size-30">Solución encontrada exitosamente</p>','<p class="font-weight-light">Recuerde que es de caracter informátivo</p>')
            ->showConfirmButton('Aceptar', '#00c9a7')
            ->toHtml()
            ->autoClose(10000);
            return view('tests.results', compact('recomendacion','num','nombreImc', 'sexo', 'edad', 'imc', 'contraindicaiones', 'parte', 'symptoms', 'intensidad'));
        }
    }
}
