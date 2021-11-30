<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Requests\UserCreateRequest;
use App\Imports\UsersImport;
use App\Mail\UserCreateMailable;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{

    //user management

    public function index(){
        abort_if(Gate::denies('user_index'), 403);
        $users = User::all();
        $roles = Role::all();
        return view('users.index' , compact('users', 'roles'));
    }

    public function create(){
        abort_if(Gate::denies('user_create'), 403);
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
        alert()->success('Aviso','<p class="font-weight-light">Usuario creado con exito</p>')
        ->toHtml()
        ->showConfirmButton('<i class="anticon anticon-like text-white"></i> OK', '#3f87f5')
        ->autoClose(9000);
        return redirect()->route('users.index');
    }

    public function edit(Request $request, $id)
    {
        abort_if(Gate::denies('user_edit'), 403);
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
        alert()->success('Aviso','<p class="font-weight-light">Actualizacion completada con exito</p>')
        ->toHtml()
        ->showConfirmButton('<i class="anticon anticon-like text-white"></i> OK', '#00c9a7')
        ->autoClose(9000);
        return redirect()->route('users.index');
    }

    //detalles de usuarios
    public function show($id){
        abort_if(Gate::denies('user_show'), 403);
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
        abort_if(Gate::denies('user_status'), 403);
        $user = User::find($id);

        if($user->status == 1 ){
            $status = 0;
        }else{
            $status = 1;
        }
        $values = array('status' => $status);
        User::where('id', $id)->update($values);
        alert()->success('<p class="font-weight-bold">Estado actualizado</p>', '<p class="font-weight-light">Exitosamente</p>')
        ->toHtml()
        ->autoClose(1000)->toToast();
        return redirect()->route('users.index');
    }

    public function newImage(Request $request, $id){
        $user = User::findOrFail($id);
        $image=$request->file('image')->getClientOriginalName();
        $url_image = $request->file('image')->storeAs('public/folder_profiles/'. auth()->id(), $image);
        $url = Storage::url($url_image);
        if($user->image != ''){
            unlink(public_path($user->image));
        }
        User::where('id' , $id)->update(['image' => $url]);
        return redirect()->back();
    }

    public function exportUsersPdf(Request $request){
        abort_if(Gate::denies('user_export_pdf'), 403);
        $status = $request->input('status');
        $roles = $request->input('roles');
        $users = User::whereHas("roles", function($q) use($roles){$q->where("id", $roles);})->where('status', $status)->get();
        $count = $users->count();
        $pdf = PDF::loadView('exports.users', compact('users'));

        if($count > 0){
            return $pdf->download('users-list.pdf');
        }else{
            return $pdf->stream('users-list.pdf');
        }
    }
    public function exportUsersExcel(){
        abort_if(Gate::denies('user_export_excel'), 403);
        return Excel::download(new UsersExport, 'user-list.xlsx');
    }

    public function importUsersExcel(Request $request){
        abort_if(Gate::denies('user_import_excel'), 403);
        $file = $request->file('file');
        $import = new UsersImport;
        $import->import($file);
        if($import->failures()->isNotEmpty()){
            return back()->withFailures($import->failures());
        }
        return redirect()->back();
    }
}
