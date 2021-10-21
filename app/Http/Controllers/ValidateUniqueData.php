<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ValidateUniqueData extends Controller
{
    public function searchDocument(Request $request){
        $numDocumento = $request->get('numDocumento');
        $jsonData = array();
        $querys = Profile::where('numDocumento' , $numDocumento)->count();;
        if($querys<= 0){
            $jsonData['success'] = 0;
            $jsonData['message'] = '';
            $jsonData['class'] = '';
        }else{
            $jsonData['success'] = 1;
            $jsonData['message'] = 'El valor del campo documento ya está en uso.';
            $jsonData['class'] = 'is-invalid';

        }
        header('Content-type: application/json; charset=utf-8');
        return json_encode($jsonData);
    }

    public function searchUserName(Request $request){
        $username = $request->get('username');
        $jsonData = array();
        $querys = User::where('username' , $username)->count();;
        if($querys<= 0){
            $jsonData['success'] = 0;
            $jsonData['message'] = '';
        }else{
            $jsonData['success'] = 1;
            $jsonData['message'] = 'El valor del campo username ya está en uso.';
        }
        header('Content-type: application/json; charset=utf-8');
        return json_encode($jsonData);
    }

    public function searchUserNameEdit(Request $request, $id){
        $user = User::find($id);
        $id = $user->id;
        $username = $request->get('username');
        $jsonData = array();
        $querys = User::where('username' , $username)
        ->where('id', '!=', $id)
        ->count();;
        if($querys<= 0){
            $jsonData['success'] = 0;
            $jsonData['message'] = '';
        }else{
            $jsonData['success'] = 1;
            $jsonData['message'] = 'El valor del campo username ya está en uso.';
        }
        header('Content-type: application/json; charset=utf-8');
        return json_encode($jsonData);
    }

    public function searchEmailEdit(Request $request, $id){
        $user = User::find($id);
        $id = $user->id;
        $email = $request->get('email');
        $jsonData = array();
        $querys = User::where('email' , $email)
        ->where('id', '!=', $id)
        ->count();;
        if($querys<= 0){
            $jsonData['success'] = 0;
            $jsonData['message'] = '';
        }else{
            $jsonData['success'] = 1;
            $jsonData['message'] = 'El valor del campo email ya está en uso.';
        }
        header('Content-type: application/json; charset=utf-8');
        return json_encode($jsonData);
    }

    public function searchEmail(Request $request){
        $email = $request->get('email');
        $jsonData = array();
        $querys = User::where('email' , $email)->count();;
        if($querys<= 0){
            $jsonData['success'] = 0;
            $jsonData['message'] = '';
        }else{
            $jsonData['success'] = 1;
            $jsonData['message'] = 'El valor del campo email ya está en uso.';
        }
        header('Content-type: application/json; charset=utf-8');
        return json_encode($jsonData);
    }
}
