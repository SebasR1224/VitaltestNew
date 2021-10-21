<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Laboratorio::paginate(8);
        return view('laboratorio.index', compact('lists'));
    }

    public function save(Request $request){

        $request->validate([
            'nombreLaboratorio' => ['required','min:5','max:50', 'unique:laboratorios,nombreLaboratorio,'.$request->id]
        ]);

        $laboratorio = new Laboratorio();
        $messageLaboratorio_add = "Laboratorio creado con exito";
        if(intval($request->id)>0){
            $laboratorio = Laboratorio::findOrFail($request->id);
            $messageLaboratorio_add = "Campo editado con exito";
        }



        $laboratorio->nombreLaboratorio = $request->nombreLaboratorio;

        $laboratorio->save();
        return redirect()->back()->with('messageLaboratorio_add' , $messageLaboratorio_add);

    }



}
