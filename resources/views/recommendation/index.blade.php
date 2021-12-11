@extends('layouts.main', ['activePage' =>'recommendation'], ['tittle' => 'Lista de Recomendaciones'])
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
                    <a href="/home" class="breadcrumb-item"><i class="text-success anticon anticon-home m-r-5"></i>Inicio</a>
                    <span class="breadcrumb-item active">Recomendaciones</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row m-b-30">
                    <h3 class=" col-lg-6 text-success">Recomendaciones</h3>
                    <div class="col-lg-6 text-right">
                        @can('recomen_config')
                        <a class="btn btn-defauld" href="{{route('config.recomen')}}" data-toggle="tooltip" data-placement="top" title="Ver sintomas y contraindicaciones">
                            <i class="anticon anticon-appstore m-r-5"></i>
                            <i class="anticon anticon-experiment"></i>
                        </a>
                        @endcan
                        @can('recomen_create')
                            <a href="{{route('recomendacion.create')}}" class="btn btn-primary">
                                <i class="anticon anticon-file-add m-r-5"></i>
                                <span>Nueva recomendación</span>
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="data-table" class="table table-hover e-commerce-table">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre de la Recomendación</th>
                                <th>Medicamentos</th>
                                <th>Sintomas</th>
                                <th>Parte del Cuerpo</th>
                                <th>Dosis</th>
                                <th>Frecuencia</th>
                                <th>Tiempo</th>
                                <th>Vigencia</th>
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
                                    <td>
                                        <a style="border-radius: 95px" type="button" class="text-dark" data-toggle="modal" data-target="#listMedicine{{$recommendation->id}}">
                                            <i class="text-success anticon anticon-medicine-box m-r-5"></i>Ver Todos...
                                        </a>
                                    </td>
                                    <td>
                                        <div class="dropright btn-group ">
                                            <a type="button" style="border-radius: 95px" class="  text-dark dropdown-toggle" data-toggle="dropdown">
                                                <span class="">
                                                    <i class="text-danger  fas fa-thermometer-half m-r-5"></i>
                                                    Ver todos...
                                                </span>
                                            </a>
                                            <div class="dropdown-menu" style="width: 300px">
                                                @foreach ($recommendation->sintomas as $sintoma)
                                                    <a style="font-size: 14px; color: #fa8c16;" class="dropdown-item short-text badge badge-pill font-weight-light m-t-5" href="#">{{$sintoma->nombreSintoma}}</a>
                                                @endforeach
                                            </div>
                                        </div>

                                    </td>
                                    <td>{{$recommendation->parte->nombreParte}}</td>
                                    <td>{{$recommendation->dosis}}</td>
                                    <td>{{$recommendation->frecuencia}}</td>
                                    <td>{{$recommendation->tiempo}}</td>
                                    @can('recomen_status')
                                    <td>
                                        <form class="form-update-status" action="{{route('recomen.status', $recommendation->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="d-flex align-items-center">
                                                @if ($recommendation->status == 1)
                                                <span class="d-inline-block"  data-toggle="tooltip" data-placement="top" title="Click para cambiar el estado de la recomendación.">
                                                    <button  class="btn btn-sm btn-default text-success">
                                                        <div>Vigente</div>
                                                    </button>
                                                </span>
                                                @else
                                                <span class="d-inline-block"  data-toggle="tooltip" data-placement="top" title="Click para cambiar el estado de la recomendación.">
                                                    <button   class="btn btn-sm btn-default text-danger ">
                                                        <div>No vigente</div>
                                                    </button>
                                                </span>
                                                @endif
                                            </div>
                                        </form>
                                    </td>
                                    @endcan
                                    <td class="text-center">
                                        @can('recomen_show')
                                            <a href="{{route('recomendacion.show', $recommendation->id)}}" style="font-size: 17px" class="btn btn-icon btn-hover text-primary btn-sm btn-rounded pull-right" data-toggle="tooltip" data-placement="left" title="Información completa de la recomendación">
                                                <i class="anticon anticon-file-search"></i>
                                            </a>
                                        @endcan
                                        @can('recomen_edit')
                                            <a href="{{route('recomendacion.edit', $recommendation->id)}}" style="font-size: 17px"  class="btn btn-icon btn-hover text-warning btn-sm btn-rounded pull-right" data-toggle="tooltip" data-placement="left" title="Editar recomendación">
                                                <i class="anticon anticon-edit"></i>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                                <div class="modal fade bd-example-modal-lg" id="listMedicine{{$recommendation->id}}">
                                    <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-wight-semibold text-success h5">Lista de medicamentos para la recomendación #{{$recommendation->id}}</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <i class="anticon anticon-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row" id="card-view">
                                                    @forelse ($recommendation->medicamentos as $medicamento)
                                                        <div class="col-md-4">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="text-center">
                                                                        <h4 class="font-weight-light text-success">{{$medicamento->nombreMedicamento}}</h4>
                                                                        <img src="{{$medicamento->imagen}}"  class="rounded" width="200px" height="200px" alt="">
                                                                        <p class="text-dark  m-t-10"><span class=" m-r-5 font-weight-semibold">Categoria:</span>{{$medicamento->categoria->nombreCategoria}}</p>
                                                                        <p class="text-dark"><span class="m-r-5 font-weight-semibold">Laboratorio:</span>{{$medicamento->laboratorio->nombreLaboratorio}}</p>
                                                                    </div>
                                                                    <div class="text-center m-t-30">
                                                                        <a href="{{route('medicines.show', $medicamento->id)}}" class="btn btn-success btn-block btn-tone font-weight-light">
                                                                            <i class="anticon anticon-eye"></i>
                                                                            <span class="m-l-5 ">Ver Detalles</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <p>Sin medicamentos</p>
                                                     @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Código</th>
                                <th>Nombre de la Recomendación</th>
                                <th>Medicamentos</th>
                                <th>Parte del Cuerpo</th>
                                <th>Sintoma</th>
                                <th>Dosis</th>
                                <th>Frcuencia</th>
                                <th>Tiempo</th>
                                <th>Vigencia</th>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $('.form-update-status').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Está seguro?',
            text: 'Esta recomendación cambiará de estado',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3f87f5',
            cancelButtonColor: '#de4436',
            confirmButtonText: '<i class="anticon anticon-like"></i> Cambiar',
            cancelButtonText: '<i class="anticon anticon-dislike"></i> Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
               this.submit();
            }
            })
        });
    </script>
    <script src="{{asset('dashboard/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('dashboard/es6/pages/e-commerce-order-list.js')}}"></script>
@endsection
