@extends('layouts.main', ['activePage' =>'users'])

@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Crear usuarios</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
                    <a class="breadcrumb-item" href="#">Usuarios</a>
                    <span class="breadcrumb-item active">Nuevo usuario</span>
                </nav>
            </div>
        </div>
    <div class="card">
        <div class="card-body">
            <h4>Registrar usuarios</h4>
            <div class="m-t-25">
                <form action="{{route('users.store')}}" method="POST" id="validation-user">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="username">Nombre de usuario</label>
                            <input  type="text" class="form-control @error('username') is-invalid @enderror" id="username"  name="username" value="{{@old('username', $user->username)}}" placeholder="Nombre de usuario" autofocus>
                            <span id="errorUsername" class="error text-danger"></span>
                            @error('username')<span class="text-danger" id="erorLaravelUsername">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Correo</label>
                            <input  type="email" class="form-control" id="email" name="email" value="{{@old('email', $user->email)}}" placeholder="Correo">
                            <span id="errorEmail" class="error text-danger"></span>
                            @error('email') <span class="text-danger" id="erorLaravelEmail">{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="roles">Rol</label>
                            <select id="roles" name="roles" class="form-control">
                                <option selected value="">Seleccione...</option>
                                @foreach ($roles as $id => $role)
                                <option value="{{$id}}">{{$role}}</option>
                                @endforeach
                            </select>
                            @error('roles')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary m-r-5" id="btnEnviar">Crear usuario</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
@section('js')
    {{-- Validacion --}}
    <script src="{{asset('dashboard/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/validation/createUserValidation.js')}}"></script>
<script>
    $("#username").on("keyup", function(){
        $.ajax({
            url: "{{route('search.username')}}",
            type: "GET",
            data:'username='+$("#username").val(),
            dataType: 'JSON',
            success: function(datos){
                $("#errorUsername").html(datos.message)
                $("#username").addClass(datos.class)
            }
        });
    });

    $("#email").on("keyup", function(){
        $.ajax({
            url: "{{route('search.email')}}",
            type: "GET",
            data:'email='+$("#email").val(),
            dataType: 'JSON',
            success: function(datos){
                $("#errorEmail").html(datos.message)
                $("#email").addClass(datos.class)
            }
        });
    });
</script>
@endsection
