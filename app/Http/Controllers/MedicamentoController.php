<?php

namespace App\Http\Controllers;

use App\Exports\MedicinesExport;
use App\Imports\MedicinesImport;
use App\Models\Categoria;
use App\Models\Laboratorio;
use App\Models\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;


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
        $medica = Medicamento::create($medicamento);
        alert()->success('Aviso','<p class="font-weight-light text-dark"><span class="font-weight-semibold">Producto agregado</span>, ahora podrá visualizarse en la tienda.</p>')
        ->toHtml()
        ->showConfirmButton('<i class="anticon anticon-like text-white"></i> Aceptar', '#00c9a7')
        ->autoClose(9000);
        return redirect()->route('medicines.show' , $medica->id);
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


        alert()->success('¡Genial!','<p class="font-weight-light text-dark">Producto actualizado con exito.</p>')
        ->toHtml()
        ->showConfirmButton('<i class="anticon anticon-like text-white"></i> Aceptar', '#00c9a7')
        ->autoClose(9000);
        return redirect()->route('medicines.show', $id);
    }


    public function updatePrice(Request $request, Medicamento $medicamento){
        $medicines = $request->only('precioNormal', 'descuento', 'precioDescuento');
        Medicamento::where('id', $medicamento->id)->update($medicines);
        toast('<p class="font-weight-light text-dark">Precio actualizado de manera correcta.</p>','success')
        ->toHtml()
        ->autoClose(5000);
        return redirect()->route('medicines.index');
    }

    public function updateStatus(Medicamento $medicamento){
        if($medicamento->status == 1 ){
            $status = 0;
        }else{
            $status = 1;
        }
        $values = array('status' => $status);
        Medicamento::where('id', $medicamento->id)->update($values);
        toast()->success('<p class="font-weight-bold">Estado actualizado</p>', '<p class="font-weight-light">Este producto no estará visible en la tienda.</p>')
        ->toHtml()
        ->autoClose(5000);
        return redirect()->route('medicines.index');
    }

    public function showCommerce(Medicamento $medicamento)
    {
        $medicamento = Medicamento::where('status', '!=', '0')->findOrfail($medicamento->id);
        $categories = Medicamento::all()->where('status', '!=', '0')->where('categoria_id', $medicamento->categoria_id)
        ->where('id', '!=', $medicamento->id);
        return view('medicines.showCommerce', compact('medicamento', 'categories'));
    }

    public function exportpdf(Request $request){
        $status = $request->input('status');
        $oferta = $request->input('oferta');
        $medicines = Medicamento::where('status', '=', $status)->$oferta('descuento')->get();
        $count = $medicines->count();
        $pdf = PDF::loadView('exports.medicines', compact('medicines'));
        if($count > 0){
            return $pdf->download('medicines-list.pdf');
        }else{
            return $pdf->stream('medicines-list.pdf');
        }
    }

    public function exportExcel(){
        return Excel::download(new MedicinesExport, 'medicines-list.xlsx');
    }


    public function importExcel(Request $request){
        $file = $request->file('file');
        Excel::import(new MedicinesImport, $file);
        return redirect()->back();
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
