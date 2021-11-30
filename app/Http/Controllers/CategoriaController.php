<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Laboratorio;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categories = Categoria::all();
        $laboratories = Laboratorio::all();
        return view('config.medicines.index', compact('categories', 'laboratories'));
    }

    public function storeAdd(Request $request){
        Categoria::create(['nombreCategoria' => $request->nombreCategoria]);
        toast('<p class="font-weight-light text-dark">Categoria agregada correctamente.</p>','success')
        ->toHtml()
        ->autoClose(5000)
        ->position('top-start');
        return redirect()->back();
    }

    public function update(Request $request, $id){
        $category = Categoria::findOrfail($id);
        $category->update(['nombreCategoria' => $request->nombreCategoria]);
        toast('<p class="font-weight-light text-dark">Categoria actualizada correctamente.</p>','success')
        ->toHtml()
        ->autoClose(5000)
        ->position('top-start');
        return redirect()->back();
    }

    public function delete($id){
        $category = Categoria::findOrfail($id);
        $category->delete();
        toast('<p class="font-weight-light text-dark">Categoria eliminada.</p>','success')
        ->toHtml()
        ->autoClose(5000)
        ->position('top-start');
        return redirect()->back();
    }

    public function store(Request $request){
        if($request->ajax()){
            $category = new Categoria();
            $category->nombreCategoria = $request->nombreCategoria;
            $category->save();
            $list = Categoria::orderBy('id', 'DESC')->get();
            return response()->json([
                'listCategory' =>$list
            ]);
        }
    }

}
