<?php

namespace App\Http\Controllers;

use App\Models\Enfermedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EnfermedadController extends Controller
{

    public function storeAdd(Request $request){
        abort_if(Gate::denies('contrain_create'), 403);
        Enfermedad::create(['nombreEnfermedad' => $request->nombreEnfermedad]);
        toast('<p class="font-weight-light text-dark">Contraindicación agregada correctamente.</p>','success')
        ->toHtml()
        ->autoClose(5000);
        return redirect()->back();
    }

    public function update(Request $request, $id){
        abort_if(Gate::denies('contrain_edit'), 403);
        $contrain = Enfermedad::findOrfail($id);
        $contrain->update(['nombreEnfermedad' => $request->nombreEnfermedad]);
        toast('<p class="font-weight-light text-dark">Contraindicación actualizada correctamente.</p>','success')
        ->toHtml()
        ->autoClose(5000);
        return redirect()->back();
    }

    public function delete($id){
        abort_if(Gate::denies('contrain_U_delete'), 403);
        $contrain = Enfermedad::findOrfail($id);
        $contrain->delete();
        toast('<p class="font-weight-light text-dark">Contraindicación eliminada.</p>','success')
        ->toHtml()
        ->autoClose(5000);
        return redirect()->back();
    }

    public function store(Request $request){
        if($request->ajax()){
            $contrain = new Enfermedad();
            $contrain->nombreEnfermedad = $request->nombreEnfermedad;
            $contrain->save();
            $list = Enfermedad::orderBy('id', 'DESC')->get();
            return response()->json([
                'listContrain' =>$list
            ]);
        }
    }
}
