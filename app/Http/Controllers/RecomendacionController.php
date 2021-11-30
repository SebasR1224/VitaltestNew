<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRecomendacionRequest;
use App\Models\Enfermedad;
use App\Models\Imc;
use App\Models\Medicamento;
use App\Models\ParteCuerpo;
use App\Models\Recomendacion;
use App\Models\Sintoma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RecomendacionController extends Controller
{
    public function index(){
        abort_if(Gate::denies('recomen_index'), 403);
        $recommendations = Recomendacion::all();
        return view('recommendation.index', compact('recommendations'));
    }

    //detalles de recomendacion
    public function show($id){
        abort_if(Gate::denies('recomen_show'), 403);
        $recommendation = Recomendacion::find($id);
        return view('recommendation.show' , compact('recommendation'));
    }

    //CRUD recomendacion

    function create(){
        abort_if(Gate::denies('recomen_create'), 403);
        $recommendation = new Recomendacion();
        $parts = ParteCuerpo::orderBy('id', 'DESC')->pluck('nombreParte', 'id');
        $symptoms = Sintoma::orderBy('id', 'DESC')->pluck('nombreSintoma', 'id');
        $imcs = Imc::orderBy('id', 'DESC')->pluck('nombreImc', 'id');

        $diseases = Enfermedad::orderBy('id', 'DESC')->get();
        $medicines = Medicamento::orderBy('id', 'DESC')->get();
        return view('recommendation.create', compact('recommendation', 'parts', 'symptoms', 'imcs', 'diseases', 'medicines'));
    }
    public function edit(Request $request, $id)
    {
        abort_if(Gate::denies('recomen_edit'), 403);
        $parts = ParteCuerpo::orderBy('id', 'DESC')->pluck('nombreParte', 'id');
        $symptoms = Sintoma::orderBy('id', 'DESC')->pluck('nombreSintoma', 'id');
        $imcs = Imc::orderBy('id', 'DESC')->pluck('nombreImc', 'id');

        $diseases = Enfermedad::orderBy('id', 'DESC')->get();
        $medicines = Medicamento::orderBy('id', 'DESC')->get();
        $recommendation = Recomendacion::findOrFail($id);
        return view('recommendation.edit',  compact('recommendation', 'parts', 'symptoms', 'imcs', 'diseases', 'medicines'));
    }


    public function store(CreateRecomendacionRequest $request){
        $recomendacion = Recomendacion::create($request->only('nombreRecomendacion', 'parte_id',
                                                              'dosis', 'frecuencia', 'tiempo', 'intensidad',
                                                               'edadMin', 'edadMax', 'imc_id',
                                                              'informacionAdicional'));
        $sintomas = $request->input('sintomas', []);
        $recomendacion->sintomas()->sync($sintomas);


        $enfermedades = $request->input('enfermedades', []);
        $recomendacion->enfermedades()->sync($enfermedades);

        $medicamentos = $request->input('medicamentos', []);
        $recomendacion->medicamentos()->sync($medicamentos);

        alert()->success('Aviso','<p class="font-weight-light text-dark"><span class="font-weight-semibold">Recomendación registrada</span>, de ser el caso se mostrará en el test.</p>')
        ->toHtml()
        ->showConfirmButton('<i class="anticon anticon-like text-white"></i> Aceptar', '#00c9a7')
        ->autoClose(9000);
        return redirect()->route('recomendacion.show', $recomendacion->id );
    }




    public function update(Request $request, $id){

        $request->validate(
            [
                'nombreRecomendacion' =>['required', 'max:255'],
                'parte_id' =>'required',
                'dosis' => ['required', 'min:6', 'max:255'],
                'frecuencia' => ['required', 'min:6', 'max:255'],
                'tiempo' => ['required', 'min:6', 'max:255'],
                'intensidad' => ['required'],
                'edadMin' => ['required'],
                'edadMax' => ['required'],
                'informacionAdicional'=> 'max:60000'
            ]
        );
        $recomendacion=Recomendacion::findOrfail($id);
        $dataRecome = $request->only('nombreRecomendacion', 'parte_id',
                                     'dosis', 'frecuencia', 'tiempo',
                                     'intensidad','edadMin', 'edadMax', 'imc_id',
                                     'informacionAdicional');

        $recomendacion->update($dataRecome);

        $sintomas = $request->input('sintomas', []);
        $recomendacion->sintomas()->sync($sintomas);

        $enfermedades = $request->input('enfermedades', []);
        $recomendacion->enfermedades()->sync($enfermedades);

        $medicamentos = $request->input('medicamentos', []);
        $recomendacion->medicamentos()->sync($medicamentos);

        alert()->success('¡Genial!','<p class="font-weight-light text-dark">Recomendación actualizada con exito.</p>')
        ->toHtml()
        ->showConfirmButton('<i class="anticon anticon-like text-white"></i> Aceptar', '#00c9a7')
        ->autoClose(9000);

        return redirect()->route('recomendacion.show', $id);
    }
}
