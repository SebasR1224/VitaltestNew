@extends('layouts.main', ['activePage' =>'users'])

@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header no-gutters">
            <div class="row justify-content-between align-items-md-center">
                <div class="col-md-6">
                    <h2 class="header-title">Detalles</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
                            <a class="breadcrumb-item" href="#">Usuarios</a>
                            <span class="breadcrumb-item active">Vista previa</span>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('users.index')}}" class="btn btn-default m-r-5" id="btnEnviar"><i class="fas fa-door-open m-r-5"></i>Volver</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="tab-content m-t-15">
                <div class="tab-pane fade show active" id="tab-account" >
                    <div class="card">
                        <div class="card-header ">
                            <h4 class="card-title ">Informacion general
                                <small class="text-muted">
                                    <i class="anticon anticon-user "></i>
                                    {{$user->username}}
                                </small>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-image  m-h-10 m-r-15" style="height: 80px; width: 80px">
                                            <img src="{{Auth::user()->image ? Auth::user()->image : asset('dashboard/images/others/img-4.jpg') }}" alt="">
                                        </div>
                                        <div class="m-l-20 m-r-20">
                                            <h5 class="m-b-5 font-size-18">{{$user->username}}</h5>
                                            <p class="opacity-07 font-size-13 m-b-0">
                                                {{$user->email}} <br>
                                                @forelse ($user->roles as $role)
                                                    {{$role->name}}
                                                @empty
                                                    Sin rol asignado
                                                @endforelse
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 offset-2">
                                    <div class="media align-items-center">
                                        <div class="m-h-10 m-r-15">
                                            Estado
                                        </div>
                                        <div class="m-l-20 m-r-20">
                                        @if ($user->status == 1)
                                        <span class="badge badge-pill badge-success">Activo</span>
                                        @else
                                        <span class="badge badge-pill badge-danger">inactivo</span>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <hr class="m-v-25">
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-4">
                                        <h6 class="font-weight-semibold p-2">Nombre:</h6>
                                        <div class="form-control">
                                            {{$datos->nombre ? $datos->nombre : ''}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <h6 class="font-weight-semibold p-2">Primer apellido:</h6>
                                        <div class="form-control">
                                            {{$datos->apellido1 ? $datos->apellido1 : ''}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <h6 class="font-weight-semibold p-2">Segundo apellido:</h6>
                                        <div class="form-control">
                                            {{$datos->apellido2 ? $datos->apellido2 : ''}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-6">
                                        <h6 class="font-weight-semibold p-2">Tipo de documento:</h6>
                                        <div class="form-control">
                                            {{$datos->nombre ? $datos->tipoDocumento : ''}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="font-weight-semibold p-2">Numero de documento:</h6>
                                        <div class="form-control">
                                            {{$datos->apellido1 ? $datos->numDocumento : ''}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-4">
                                        <h6 class="font-weight-semibold p-2">Teléfono:</h6>
                                        <div class="form-control">
                                            {{$datos->nombre ? $datos->telefono : ''}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <h6 class="font-weight-semibold p-2">Dirección:</h6>
                                        <div class="form-control">
                                            {{$datos->apellido1 ? $datos->direccion : ''}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <h6 class="font-weight-semibold p-2">Fecha de nacimiento :</h6>
                                        <div class="form-control">
                                            {{$datos->apellido1 ? $datos->fechaNacimiento : ''}}
                                        </div>
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
