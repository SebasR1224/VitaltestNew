@extends('layouts.main', ['activePage' =>'recommendation'])
@section('css')
    <link href="{{asset('dashboard/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Lista de Recomendaciones</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="/home" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
                    <span class="breadcrumb-item active">Recomendaciones</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-8 p-10">
                        <h3 class="h3 text-primary font-weight-light">Recomendaciones</h3>
                    </div>
                    <div class="col-lg-4 p-5 text-right">
                        <a href="" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Registrar nuevo producto">
                            <i class="anticon anticon-plus-circle m-r-5"></i>
                            <span>Agregar Recomendación</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-hover e-commerce-table">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre de la Recomendación</th>
                                <th>Sintomas</th>
                                <th>Parte del Cuerpo</th>
                                <th>Dosis</th>
                                <th>Frecuencia</th>
                                <th>Tiempo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recommendations as $recommendation)
                                <tr>
                                    <td>
                                        #{{$recommendation->id}}
                                    </td>
                                    <td><h6 class="m-b-0 m-l-10">{{$recommendation->nombreRecomendacion}}</h6></td>
                                    <td></td>
                                    <td>{{$recommendation->parte->nombreParte}}</td>
                                    <td>{{$recommendation->dosis}}</td>
                                    <td>{{$recommendation->frecuencia}}</td>
                                    <td>{{$recommendation->tiempo}}</td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right" data-toggle="tooltip" data-placement="left" title="Información completa del producto">
                                            <i class="anticon anticon-info-circle"></i>
                                        </a>
                                        <a href=""  class="btn btn-icon btn-hover btn-sm btn-rounded pull-right" data-toggle="tooltip" data-placement="left" title="Editar este producto">
                                            <i class="anticon anticon-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Código</th>
                                <th>Nombre de la Recomendación</th>
                                <th>Parte del Cuerpo</th>
                                <th>Sintoma</th>
                                <th>Dosis</th>
                                <th>Frcuencia</th>
                                <th>Tiempo</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
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
