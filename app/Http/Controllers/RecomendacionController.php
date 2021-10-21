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

class RecomendacionController extends Controller
{
    public function index(){
        $lists = Recomendacion::paginate(8);
        return view('recomendacion.index', compact('lists'));
    }

    //detalles de recomendacion
    public function show($id){
        $recomendacion = Recomendacion::find($id);
        return view('recomendacion.show' , compact('recomendacion'));
    }

    //CRUD recomendacion

    function create(){
        $recomendacion = new Recomendacion();
        $partes = ParteCuerpo::orderBy('nombreParte')->get();
        $sintomas = Sintoma::orderBy('nombreSintoma')->get();
        $imcs = Imc::orderBy('nombreImc')->get();

        $enfermedades = Enfermedad::all()->pluck('nombreEnfermedad','id');
        $medicamentos = Medicamento::all()->pluck('nombreMedicamento', 'id');
        return view('recomendacion.create', compact('recomendacion', 'partes', 'sintomas', 'imcs', 'enfermedades', 'medicamentos'));
    }

    public function edit(Request $request, $id)
    {
        $partes = ParteCuerpo::orderBy('nombreParte')->get();
        $sintomas = Sintoma::orderBy('nombreSintoma')->get();
        $imcs = Imc::orderBy('nombreImc')->get();

        $enfermedades = Enfermedad::all()->pluck('nombreEnfermedad','id');
        $medicamentos = Medicamento::all()->pluck('nombreMedicamento', 'id');
        $recomendacion = Recomendacion::findOrFail($id);
        return view('recomendacion.edit',  compact('recomendacion', 'partes', 'sintomas', 'imcs', 'enfermedades', 'medicamentos'));
    }


    public function store(CreateRecomendacionRequest $request){
        $recomendacion = Recomendacion::create($request->only('nombreRecomendacion', 'parte_id', 'sintoma_id',
                                                              'dosis', 'frecuencia', 'tiempo', 'intensidadMin',
                                                              'intensidadMax','edadMin', 'edadMax', 'imc_id',
                                                              'informacionAdicional', 'estado'));
        $enfermedades = $request->input('enfermedades', []);
        $recomendacion->enfermedades()->sync($enfermedades);

        $medicamentos = $request->input('medicamentos', []);
        $recomendacion->medicamentos()->sync($medicamentos);
        return redirect()->route('recomendacion.show', $recomendacion->id )->with('messageRecomendacion_add', 'Informacion ingresada con exito');
    }




    public function update(Request $request, $id){

        $request->validate(
            [
          'nombreRecomendacion' =>['required', 'min:6', 'max:255', 'unique:recomendacions,nombreRecomendacion,'.$id],
          'parte_id' =>'required',
          'sintoma_id' =>'required',
          'dosis' => ['required', 'min:6', 'max:255'],
          'frecuencia' => ['required', 'min:6', 'max:255'],
          'tiempo' => ['required', 'min:6', 'max:255'],
          'intensidadMin' => ['required', 'max:2'],
          'intensidadMax' => 'required', 'max:2',
          'edadMin' => ['required', 'max:2'],
          'edadMax' => ['required', 'max:2'],
          'informacionAdicional'=> 'max:255'
            ]
        );
        $recomendacion=Recomendacion::findOrfail($id);
        $dataRecome = $request->only('nombreRecomendacion', 'parte_id', 'sintoma_id',
                                     'dosis', 'frecuencia', 'tiempo', 'intensidadMin',
                                     'intensidadMax','edadMin', 'edadMax', 'imc_id',
                                     'informacionAdicional', 'estado');

        $recomendacion->update($dataRecome);
        $enfermedades = $request->input('enfermedades', []);
        $recomendacion->enfermedades()->sync($enfermedades);

        $medicamentos = $request->input('medicamentos', []);
        $recomendacion->medicamentos()->sync($medicamentos);
        return redirect()->route('recomendacion.show', $recomendacion->id)->with('messageRecomendacion_add', 'Se han actualizado los campos');
    }
}
