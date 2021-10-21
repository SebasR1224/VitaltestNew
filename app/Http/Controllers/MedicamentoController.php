<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Laboratorio;
use App\Models\Medicamento;
use App\Models\Recomendacion;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Medicamento::paginate(8);
        return view('medicamentos.index', compact('lists'));
    }

    public function commerce()
    {
        $medicamentos = Medicamento::paginate(8);
        return view('medicamentos.commerce', compact('medicamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicamento = new Medicamento();
        $laboratorios = Laboratorio::orderBy('nombreLaboratorio')->get();
        $categorias = Categoria::orderBy('nombreCategoria')->get();

        return view('medicamentos.create', compact('medicamento', 'laboratorios', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicamento = $request->all();

        if($imagen = $request->file('imagen')){
            $rutaGuardarImg = 'imagen/';
            $imagenMedicamento = date('YmdHis'). "." .$imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenMedicamento);
            $medicamento['imagen'] = "$imagenMedicamento";
        }
        Medicamento::create($medicamento);
        return redirect()->route('medicamentos.index')->with('messageMedicamento_add', 'Informacion ingresada con exito');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Medicamento $medicamento)
    {
        return view('medicamentos.show', compact('medicamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicamento $medicamento)
    {
        $laboratorios = Laboratorio::orderBy('nombreLaboratorio')->get();
        $categorias = Categoria::orderBy('nombreCategoria')->get();
        return view('medicamentos.edit', compact('medicamento', 'laboratorios', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        $medica = $request->all();
        if($imagen = $request->file('imagen')){
            $rutaGuardarImg = 'imagen/';
            $imagenMedicamento = date('YmdHis'). "." .$imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenMedicamento);
            $medica['imagen'] = "$imagenMedicamento";
        }else{
            unset($medica['imagen']);
        }
        $medicamento->update($medica);
        return redirect()->route('medicamentos.index')->with('messageMedicamento_add', 'Informacion editada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
