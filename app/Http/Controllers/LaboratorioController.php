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

    public function storeAdd(Request $request){
        Laboratorio::create(['nombreLaboratorio' => $request->nombreLaboratorio]);
        toast('<p class="font-weight-light text-dark">Laboratorio agregado correctamente.</p>','success')
        ->toHtml()
        ->autoClose(5000);
        return redirect()->back();
    }

    public function update(Request $request, $id){
        $laboratory = Laboratorio::findOrfail($id);
        $laboratory->update(['nombreLaboratorio' => $request->nombreLaboratorio]);
        toast('<p class="font-weight-light text-dark">Laboratorio actualizado correctamente.</p>','success')
        ->toHtml()
        ->autoClose(5000);
        return redirect()->back();
    }

    public function delete($id){
        $laboratory = Laboratorio::findOrfail($id);
        $laboratory->delete();
        toast('<p class="font-weight-light text-dark">Laboratorio eliminado</p>','success')
        ->toHtml()
        ->autoClose(5000);
        return redirect()->back();
    }


    public function store(Request $request){

        if($request->ajax()){
            $laboratory = new Laboratorio();
            $laboratory->nombreLaboratorio = $request->nombreLaboratorio;
            $laboratory->save();

            $list = Laboratorio::orderBy('id', 'DESC')->get();

            return response()->json([
                'listLaboratory' =>$list
            ]);
        }

    }

}
