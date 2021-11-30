<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Laboratorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoriaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_config'), 403);
        $categories = Categoria::all();
        $laboratories = Laboratorio::all();
        return view('config.medicines.index', compact('categories', 'laboratories'));
    }

    public function storeAdd(Request $request){
        abort_if(Gate::denies('category_create'), 403);
        Categoria::create(['nombreCategoria' => $request->nombreCategoria]);
        toast('<p class="font-weight-light text-dark">Categoria agregada correctamente.</p>','success')
        ->toHtml()
        ->autoClose(5000)
        ->position('top-start');
        return redirect()->back();
    }

    public function update(Request $request, $id){
        abort_if(Gate::denies('category_edit'), 403);
        $category = Categoria::findOrfail($id);
        $category->update(['nombreCategoria' => $request->nombreCategoria]);
        toast('<p class="font-weight-light text-dark">Categoria actualizada correctamente.</p>','success')
        ->toHtml()
        ->autoClose(5000)
        ->position('top-start');
        return redirect()->back();
    }

    public function delete($id){
        abort_if(Gate::denies('category_U_delete'), 403);
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
