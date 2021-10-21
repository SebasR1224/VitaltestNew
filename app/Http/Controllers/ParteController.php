<?php

namespace App\Http\Controllers;

use App\Models\ParteCuerpo;
use Illuminate\Http\Request;
class ParteController extends Controller
{

    public function show(){
        $partes = ParteCuerpo::paginate(8);
        return view('recomendacion.partes', compact('partes'));
    }

    public function save(Request $request){

        $request->validate([
            'nombreParte' =>'required|min:3|max:50|unique:parte_cuerpos,nombreParte,'.$request->id,
        ]);

        $parte = new ParteCuerpo();
        $messageParte_add = "Parte de cuerpo creada con exito";
        if(intval($request->id)>0){
            $parte = ParteCuerpo::findOrFail($request->id);
            $messageParte_add = "Campo editado con exito";
        }



        $parte->nombreParte = $request->nombreParte;

        $parte->save();
        return redirect()->back()->with('messageParte_add' , $messageParte_add);

    }
}
