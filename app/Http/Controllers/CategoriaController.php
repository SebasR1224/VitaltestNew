<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $lists = Categoria::paginate(8);
        return view('categoria.index', compact('lists'));
    }

    public function save(Request $request){

        $request->validate([
            'nombreCategoria' => ['required','min:5','max:50', 'unique:categorias,nombreCategoria,'.$request->id]
        ]);

        $categoria = new Categoria();
        $messageCategoria_add = "Categoria creada con exito";
        if(intval($request->id)>0){
            $categoria = Categoria::findOrFail($request->id);
            $messageCategoria_add = "Campo editado con exito";
        }



        $categoria->nombreCategoria = $request->nombreCategoria;

        $categoria->save();
        return redirect()->back()->with('messageCategoria_add' , $messageCategoria_add);

    }
}
