<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class ProfileController extends Controller
{

    public function create(Request $request){
        $request->validate(
            [
                'numDocumento' =>'unique:profiles'
            ]
        );
        Profile::create($request->only(
            'nombre',
            'user_id',
            'apellido1',
            'apellido2',
            'tipoDocumento',
            'numDocumento',
            'telefono',
            'direccion',
            'fechaNacimiento'
        ));
        alert()->success('Aviso','<p class="font-weight-light">Perfil completado con éxito</p>')
        ->toHtml()
        ->showConfirmButton('<i class="anticon anticon-like text-white"></i> OK', '#00c9a7')
        ->autoClose(9000);
        return redirect()->back();
    }

    public function update(Request $request, $id){
        $profile=Profile::findOrfail($id);
        $dataProfile = $request->only(
            'nombre',
            'user_id',
            'apellido1',
            'apellido2',
            'tipoDocumento',
            'telefono',
            'direccion',
            'fechaNacimiento'
        );
        if(Hash::check($request->password, Auth::user()->password)){
            $profile->update($dataProfile);
            toast('<span class=" font-weight-light">Datos actualizados correctamente</span>','success')
            ->toToast()
            ->toHtml()
            ->autoClose(2500)
            ->position('top');
        }else{
            toast('<span class=" font-weight-light">Contraseña incorrecta, intente nuevamente</span>','error')
            ->showCloseButton()
            ->toHtml()
            ->autoClose(2300)
            ->position('top');
        }
        return redirect()->back();
    }
    public function updatePassword(Request $request){

        if(Hash::check($request->oldpassword, Auth::user()->password)){
           $user = new User;
           $password=$request->input('newpassword');
           $data['password'] = bcrypt($password);
           $user->where('id', '=', Auth::user()->id)
           ->update($data);
           toast('<span class=" font-weight-light">Contraseña actualizada con éxito</span>','success')
            ->toHtml()
            ->autoClose(2500);
        }else{
            toast('<span class=" font-weight-light">Contraseña incorrecta, intente nuevamente</span>','error')
            ->showCloseButton()
            ->toHtml()
            ->autoClose(2300);
        }
        return redirect()->back();
    }
}
