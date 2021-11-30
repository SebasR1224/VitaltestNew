@extends('layouts.main', ['activePage' =>'roles'])
@section('css')
<link href="{{asset('dashboard/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header no-gutters">
            <div class="row justify-content-between align-items-md-center">
                <div class="col-md-6">
                    <h2 class="header-title">Asignar Permisos</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="/home" class="breadcrumb-item"><i class="text-success anticon anticon-home m-r-5"></i>Inicio</a>
                            <a class="breadcrumb-item" href="/users"><i class="text-success anticon anticon-usergroup-add m-r-5"></i>Usuarios</a>
                            <span class="breadcrumb-item active">Asignar Permisos</span>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('users.index')}}" class="btn btn-default m-r-5" id="btnEnviar"><i class="fas fa-door-open m-r-5"></i>Volver</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-header">
                   <h4 class="card-title"> Conceder permisos</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between ">

                        @if ($role->id == 1)
                        <h4>Rol: <span class="font-weight-light">{{$role->name}}<i class="text-warning anticon anticon-crown m-l-5"></i></span></h4>
                        @endif
                        @if ($role->id == 2)
                        <h4>Rol: <span class="font-weight-light">{{$role->name}}<i class="text-primary anticon anticon-branches m-l-5"></i> </span></h4>
                        @endif
                        @if ($role->id == 3)
                        <h4>Rol: <span class="font-weight-light">{{$role->name}}<i class="text-success anticon anticon-star m-l-5"></i></span></h4>
                        @endif

                        @can('user_permission')
                            <span data-toggle="tooltip" data-placement="top" title="Configurar permisos para usuarios teniendo en cuenta el rol">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-defauld dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="anticon anticon-setting m-r-5"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        @foreach ($roles as $role)
                                            <a href="{{route('roles.edit', $role->id)}}" class="dropdown-item">{{$role->name}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </span>
                        @endcan
                    </div>
                    <hr>
                    <h5>Permisos asignados</h5>
                    <h5 class="m-t-20">
                        @foreach ($permissions as $id=> $permission)
                            <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">{{$permission}}</span>
                        @endforeach
                    </h5>
                    <hr>
                    <h5>Conceder permisos</h5>
                    <form action="{{route('roles.update' , $role->id)}}" method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="table-responsive">
                            <table class="table table-hover e-commerce-table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="checkbox">
                                                <input id="checkAll" type="checkbox">
                                                <label for="checkAll" class="m-b-0"></label>
                                            </div>
                                        </th>
                                        <th>Nombre del Permiso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $id=> $permission)
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <input id="check-item-{{$id}}" type="checkbox" name="permissions[]" value="{{$id}}" {{$role->permissions->contains($id) ? 'checked' : ''}}>
                                                <label for="check-item-{{$id}}" class="m-b-0"></label>
                                            </div>
                                        </td>
                                        <td>
                                            {{$permission}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button  type="submit" class=" float-right m-t-20 btn btn-lg btn-success">Conceder Permisos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{asset('dashboard/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('dashboard/es6/pages/e-commerce-order-list.js')}}"></script>
@endsection
