<?php

namespace App\Http\Controllers;

use App\Models\Sintoma;
use Illuminate\Http\Request;

class SintomaController extends Controller
{

    public function show(){
        $sintomas = Sintoma::paginate(8);
        return view('recomendacion.sintomas', compact('sintomas'));
    }

    public function save(Request $request){

        $request->validate([
            'nombreSintoma' => ['required','min:5','max:50', 'unique:sintomas,nombreSintoma,'.$request->id]
        ]);

        $sintoma = new Sintoma();
        $messageSintoma_add = "Sintoma creado con exito";
        if(intval($request->id)>0){
            $sintoma = Sintoma::findOrFail($request->id);
            $messageSintoma_add = "Campo editado con exito";
        }



        $sintoma->nombreSintoma = $request->nombreSintoma;

        $sintoma->save();
        return redirect()->back()->with('messageSintoma_add' , $messageSintoma_add);

    }

    // public function destroy(Sintoma $sintomas)
    // {
    //     $sintomas->delete();
    //     return redirect()->back()->with('messageSintoma_add', 'Sintoma eliminado correctamente');
    // }

}
