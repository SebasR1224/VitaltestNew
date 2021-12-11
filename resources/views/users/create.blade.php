@extends('layouts.main', ['activePage' =>'userCreate'], ['tittle' => 'Nuevo Usuario'])

@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header no-gutters">
            <div class="row justify-content-between align-items-md-center">
                <div class="col-md-6">
                    <h2 class="header-title">Nuevo Usuario</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="/home" class="breadcrumb-item"><i class="text-success anticon anticon-home m-r-5"></i>Inicio</a>
                            <a class="breadcrumb-item" href="/users"><i class="text-success anticon anticon-usergroup-add m-r-5"></i>Usuarios</a>
                            <span class="breadcrumb-item active">Nuevo Usuario</span>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('users.index')}}" class="btn btn-default m-r-5" id="btnEnviar"><i class="fas fa-door-open m-r-5"></i>Volver</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class=" card-title text-primary">Registrar Usuario</h4>
                    </div>
                    <div class="card-body">
                        <p class="font-weight-light">Complete todos los campos para crear un nuevo usuario.</p>
                        <div class="m-t-25">
                            <form action="{{route('users.store')}}" method="POST" id="validation-user">
                                @csrf
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label control-label"><span class="h6">Nombre de usuario:</span></label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="username" name="username" value="{{@old('username', $user->username)}}" placeholder="Nombre de usuario" autofocus>
                                        <span id="errorUsername" class="error text-danger"></span>
                                        @error('username')<span class="text-danger" id="erorLaravelUsername">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label control-label"><span class="h6">Correo:</span></label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control" name="email" id="email" value="{{@old('email', $user->email)}}" placeholder="Correo">
                                        <span id="errorEmail" class="error text-danger"></span>
                                        @error('email') <span class="text-danger" id="erorLaravelEmail">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="roles" class="col-sm-2 col-form-label control-label"><span class="h6">Rol de usuario:</span></label>
                                    <div class="col-md-10">
                                        <select id="roles" name="roles" class="custom-select">
                                            <option selected value="">Seleccione...</option>
                                            @foreach ($roles as $id => $role)
                                            <option value="{{$id}}">{{$role}}</option>
                                            @endforeach
                                        </select>
                                        @error('roles')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-primary m-r-5" id="btnEnviar">Crear usuario</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="m-t-30">
                            <div class="d-flex">
                                <div class="text-center">
                                    <img src="{{secure_asset('dashboard/images/others/createUser.svg')}}" alt="" class="d-block w-75">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    {{-- Validacion --}}
    <script src="{{secure_asset('dashboard/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{secure_asset('js/validation/createUserValidation.js')}}"></script>
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
