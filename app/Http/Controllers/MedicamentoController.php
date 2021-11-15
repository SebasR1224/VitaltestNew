<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Laboratorio;
use App\Models\Medicamento;
use App\Models\Recomendacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicamento::all();
        return view('medicines.index', compact('medicines'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicamento = new Medicamento();
        $laboratories = Laboratorio::orderBy('id', 'DESC')->pluck('nombreLaboratorio' , 'id');
        $categories = Categoria::orderBy('id', 'DESC')->pluck('nombreCategoria' , 'id');
        return view('medicines.create', compact('medicamento', 'laboratories', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombreMedicamento' => 'required|max:200',
            'categoria_id' => 'required',
            'laboratorio_id' => 'required',
            'precioNormal' => 'required',
            'licencia' => 'required|max:200',
            'fichaTecnica' => 'max:60000',
            'avisoLegal' => 'max:60000',
            'imagen' => 'required|image|max:2048'
        ]);

        $medicamento = $request->all();

        if($request->hasFile('imagen')){
            $medicamento['imagen'] = $request->file('imagen')->getClientOriginalName();
            $url_image = $request->file('imagen')->storeAs('public/folder_medicines/'. $request->input('categoria_id'), $medicamento['imagen']);
            $medicamento['imagen']  = Storage::url($url_image);
        }
        Medicamento::create($medicamento);
        return redirect()->route('medicines.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicamento = Medicamento::findOrfail($id);
        return view('medicines.show', compact('medicamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicamento = Medicamento::findOrfail($id);
        $laboratories = Laboratorio::orderBy('id', 'DESC')->pluck('nombreLaboratorio' , 'id');
        $categories = Categoria::orderBy('id', 'DESC')->pluck('nombreCategoria' , 'id');
        return view('medicines.edit', compact('medicamento', 'laboratories', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $medicamento = Medicamento::findOrfail($id);
        $request->validate([
            'nombreMedicamento' => 'required|max:200',
            'categoria_id' => 'required',
            'laboratorio_id' => 'required',
            'precioNormal' => 'required',
            'licencia' => 'required|max:200',
            'fichaTecnica' => 'max:60000',
            'avisoLegal' => 'max:60000',
            'imagen' => 'image|max:2048'
        ]);

        $medicamento->update($request->only([
            'nombreMedicamento',
            'categoria_id',
            'laboratorio_id',
            'precioNormal',
            'descuento',
            'precioDescuento',
            'licencia',
            'fichaTecnica',
            'avisoLegal'
        ]));

        if($request->hasFile('imagen')){
            $medicamento['imagen'] = $request->file('imagen')->getClientOriginalName();
            $url_image = $request->file('imagen')->storeAs('public/folder_medicines/'. $request->input('categoria_id'), $medicamento['imagen']);
            $medicamento['imagen']  = Storage::url($url_image);

            $medicamento->update(['imagen' => $medicamento['imagen']]);
        }

        return redirect()->route('medicines.index');
    }


    public function updatePrice(Request $request, Medicamento $medicamento){
        $medicines = $request->only('precioNormal', 'descuento', 'precioDescuento');
        Medicamento::where('id', $medicamento->id)->update($medicines);
        return redirect()->route('medicines.index');
    }

    public function showCommerce(Medicamento $medicamento)
    {
        $medicamento = Medicamento::findOrfail($medicamento->id);
        $categories = Medicamento::all()->where('categoria_id', $medicamento->categoria_id)
        ->where('id', '!=', $medicamento->id);
        return view('medicines.showCommerce', compact('medicamento', 'categories'));
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
