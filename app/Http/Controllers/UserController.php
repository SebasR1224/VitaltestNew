<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Mail\UserCreateMailable;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class UserController extends Controller
{

    //user management

    public function index(){
        $users = User::all();
        return view('users.index' , compact('users'));
    }

    public function create(){
        $roles = Role::all()->pluck('name', 'id');
        return view('users.create' , compact('roles'));
    }


    public function store(UserCreateRequest $request){
        $password = Str::random(10);
        $user = User::create($request->only('username' , 'email')
        + [
            'password'=>bcrypt($password),
        ]);

        $roles = $request->input('roles');

        $user->syncRoles($roles);

        Mail::to($request->input('email'))->send(
            new UserCreateMailable(
                $request->input('username'),
                $request->input('email'),
                $request->input('roles'),
                $password
            )
        );
        return redirect()->route('users.index')->with('messageUser', 'Usuario creado con exito');
    }

    public function edit(Request $request, $id)
    {
        $user=User::findOrfail($id);

        $roles = Role::all()->pluck('name' , 'id');
        $user->load('roles');
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                    'username' => 'required|min:6|max:18|unique:users,username,'.$id,
                    'email' =>    ['required','email','min:6','max:30','unique:users,email,'.$id]
                    ]
        );
        $user=User::findOrfail($id);
        $data = $request->only('username' , 'email');
        $password=$request->input('password');
        if($password)
            $data['password'] = bcrypt($password);

        $user->update($data);
        $roles = $request->input('roles');
        $user->syncRoles($roles);
        return redirect()->route('users.index')->with('messageUser', 'Usuario actualizado correctamente');
    }

    //detalles de usuarios
    public function show($id){
        $user = User::find($id);
        $datos=$user->profile ? $user->profile : new Profile();
        $user->load('roles');
        return view('users.show' , compact('datos', 'user'));
    }

    //profile
    public function profile($id){
            $user = User::find($id);
            $datos = $user->profile ? $user->profile : new Profile() ;
        return view('users.profile' , compact('datos', 'user'));
    }

    //estatus del usuario
    public function statusUser($id){
        $user = User::find($id);

        if($user->status == 1 ){
            $status = 0;
        }else{
            $status = 1;
        }
        $values = array('status' => $status);
        DB::table('users')->where('id',$id)->update($values);
        return redirect()->route('users.index')->with('message_status', 'Estado actualizado');
    }
}
