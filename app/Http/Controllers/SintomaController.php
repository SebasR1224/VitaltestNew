<?php

namespace App\Http\Controllers;

use App\Models\Enfermedad;
use App\Models\Sintoma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SintomaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('recomen_config'), 403);
        $sintomas = Sintoma::all();
        $contrain = Enfermedad::all();
        return view('config.recomendaciones.index', compact('sintomas', 'contrain'));
    }

    public function storeAdd(Request $request){
        abort_if(Gate::denies('sintoma_create'), 403);
        Sintoma::create(['nombreSintoma' => $request->nombreSintoma]);
        toast('<p class="font-weight-light text-dark">Sintoma agregado correctamente.</p>','success')
        ->toHtml()
        ->autoClose(5000)
        ->position('top-start');
        return redirect()->back();
    }

    public function update(Request $request, $id){
        abort_if(Gate::denies('sintoma_edit'), 403);
        $sintoma = Sintoma::findOrfail($id);
        $sintoma->update(['nombreSintoma' => $request->nombreSintoma]);
        toast('<p class="font-weight-light text-dark">Sintoma actualizado correctamente.</p>','success')
        ->toHtml()
        ->autoClose(5000)
        ->position('top-start');
        return redirect()->back();
    }

    public function delete($id){
        abort_if(Gate::denies('sintoma_U_delete'), 403);
        $sintoma = Sintoma::findOrfail($id);
        $sintoma->delete();
        toast('<p class="font-weight-light text-dark">Sintoma eliminado.</p>','success')
        ->toHtml()
        ->autoClose(5000)
        ->position('top-start');
        return redirect()->back();
    }

    public function store(Request $request){
        if($request->ajax()){
            $sintoma = new Sintoma();
            $sintoma->nombreSintoma = $request->nombreSintoma;
            $sintoma->save();
            $list = Sintoma::orderBy('id', 'DESC')->get();
            return response()->json([
                'listSintoma' =>$list
            ]);
        }
    }

}
