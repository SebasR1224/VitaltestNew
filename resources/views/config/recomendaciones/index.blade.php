@extends('layouts.main', ['activePage' =>'configRecomen'], ['tittle' => 'Sintomas | Contraindicaciones'])
@section('css')
    <link href="{{secure_asset('dashboard/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <div class="row justify-content-between align-items-md-center">
                <div class="col-md-6">
                    <h2 class="header-title">Otros campos recomendación</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="/home" class="breadcrumb-item"><i class="text-success anticon anticon-home m-r-5"></i>Inicio</a>
                            <a class="breadcrumb-item" href="/recomendaciones"><i class="text-success anticon anticon-file-protect  m-r-5"></i></i>Recomendaciones</a>
                            <span class="breadcrumb-item active">Otros campos recomendación</span>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('recomendacion.index')}}" class="btn btn-default m-r-5" id="btnEnviar" data-toggle="tooltip" data-placement="left" title="Volver a recomendaciones" ><i class="fas fa-door-open m-r-5"></i>Volver</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row m-b-30">
                                <h3 class=" col-lg-6 text-success">Lista de Sintomas</h3>
                                <div class="col-lg-6 text-right">
                                    @can('sintoma_create')
                                        <button type="button" data-toggle="modal" data-target="#createSintoma" class="btn btn-primary">
                                            <i class="fas fa-burn m-r-5"></i>
                                            <span>Nuevo sintoma</span>
                                        </button>
                                    @endcan
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="data-table" class="table table-hover e-commerce-table">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre sintoma</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sintomas as $sintoma)
                                            <tr>
                                                <td>
                                                    #{{$sintoma->id}}
                                                </td>
                                                <td><h6 class="m-b-0 m-l-10">{{$sintoma->nombreSintoma}}</h6></td>
                                                <td class="text-center">
                                                    @can('sintoma_edit')
                                                    <span data-toggle="tooltip" data-placement="left" title="Editar sintoma">
                                                        <button type="button"  data-toggle="modal" data-target="#editSintoma{{$sintoma->id}}" style="font-size: 17px"  class="btn btn-icon btn-hover text-warning btn-sm btn-rounded pull-right" >
                                                            <i class="anticon anticon-edit"></i>
                                                        </button>
                                                    </span>
                                                        <div class="modal fade" id="editSintoma{{$sintoma->id}}">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title text-success" id="exampleModalCenterTitle">Editar Sintoma</h5>
                                                                        <button type="button" class="close" data-dismiss="modal">
                                                                            <i class="anticon anticon-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <form action="{{route('sintoma.update', $sintoma->id)}}" method="post" id="edit-sintoma">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="nombreSintoma">Nombre del sintoma:</label>
                                                                                <input type="text" name="nombreSintoma" id="nombreSintoma" class="form-control" value="{{$sintoma->nombreSintoma}}" placeholder="Nombre sintoma" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                            <button type="submit" class="btn btn-success">Editar sintoma</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endcan
                                                    @can('sintoma_U_delete')
                                                        <form action="{{route('sintoma.delete', $sintoma->id)}}" class="d-inline delete-sintoma" method="post">
                                                        @csrf
                                                        <button type="submit" style="font-size: 17px"  class="btn btn-icon btn-hover text-danger btn-sm btn-rounded pull-right" data-toggle="tooltip" data-placement="left" title="Eliminar sintoma">
                                                            <i class="anticon anticon-delete"></i>
                                                        </button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre sintoma</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row m-b-30">
                                <h3 class=" col-lg-6 text-success">Lista de Contraindicaciones</h3>
                                <div class="col-lg-6 text-right">
                                    @can('contrain_create')
                                        <button type="button" data-toggle="modal" data-target="#createContrain" class="btn btn-primary">
                                            <i class="fab fa-envira m-r-5"></i>
                                            <span>Nueva contraindicación</span>
                                        </button>
                                    @endcan
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="data-table" class="table table-hover e-commerce-table">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre contraindicación</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contrain as $contrai)
                                            <tr>
                                                <td>
                                                    #{{$contrai->id}}
                                                </td>
                                                <td><h6 class="m-b-0 m-l-10">{{$contrai->nombreEnfermedad}}</h6></td>
                                                <td class="text-center">
                                                    @can('contrain_edit')
                                                    <span data-toggle="tooltip" data-placement="left" title="Editar contraindicación">
                                                        <button type="button"  style="font-size: 17px" data-toggle="modal" data-target="#editContrain{{$contrai->id}}" class="btn btn-icon btn-hover text-warning btn-sm btn-rounded pull-right">
                                                            <i class="anticon anticon-edit"></i>
                                                        </button>
                                                    </span>
                                                        <div class="modal fade" id="editContrain{{$contrai->id}}">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title text-success" id="exampleModalCenterTitle">Editar Contraindicaión</h5>
                                                                        <button type="button" class="close" data-dismiss="modal">
                                                                            <i class="anticon anticon-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <form action="{{route('contrain.update', $contrai->id)}}" method="post" id="edit-contrain">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="nombreEnfermedad">Nombre de la contraindicación:</label>
                                                                                <input type="text" class="form-control" name="nombreEnfermedad" id="nombreEnfermedad" placeholder="Nombre contraindicación" value="{{$contrai->nombreEnfermedad}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                            <button type="submit" class="btn btn-success">Editar Contraindicación</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endcan
                                                    @can('contrain_U_delete')
                                                    <form action="{{route('contrain.delete', $contrai->id)}}" class="d-inline delete-contrain" method="post">
                                                       @csrf
                                                        <button type="submit" style="font-size: 17px"  class="btn btn-icon btn-hover text-danger btn-sm btn-rounded pull-right" data-toggle="tooltip" data-placement="left" title="Eliminar contraindicación">
                                                            <i class="anticon anticon-delete"></i>
                                                        </button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre contraindicación</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@can('sintoma_create')
    <div class="modal fade" id="createSintoma">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalCenterTitle">Agregar Sintoma</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <form action="{{route('sintoma.storeAdd')}}" method="post" id="create_sintoma">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="nombreSintoma">Nombre del sintoma:</label>
                            <input type="text" class="form-control" name="nombreSintoma" id="nombreSintoma" autocomplete="off" placeholder="Nombre sintoma">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar sintoma</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcan
@can('contrain_create')
    <div class="modal fade" id="createContrain">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  text-primary" id="exampleModalCenterTitle">Agregar Contraindicación</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <form action="{{route('contrain.storeAdd')}}" method="POST" id="create_Contrain">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombreEnfermedad">Nombre del Contraindicación:</label>
                            <input type="text" class="form-control" name="nombreEnfermedad" id="nombreEnfermedad" placeholder="Nombre contraindicación" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerar</button>
                        <button type="submit" class="btn btn-primary">Agregar contraindicación</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcan
@endsection
@section('js')
    <script src="{{secure_asset('dashboard/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{secure_asset('dashboard/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{secure_asset('dashboard/es6/pages/e-commerce-order-list.js')}}"></script>
    <script src="{{secure_asset('dashboard/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{secure_asset('js/validation/configRecomen.js')}}"></script>


    {{-- Alertas de confirmacion estado --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.delete-sintoma').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Está seguro?',
            text: "Eliminará este sintoma",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3f87f5',
            cancelButtonColor: '#de4436',
            confirmButtonText: '<i class="anticon anticon-like"></i> Eliminar',
            cancelButtonText: '<i class="anticon anticon-dislike"></i> Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
               this.submit();
            }
            })
        });
    </script>

<script>
    $('.delete-contrain').submit(function(e){
        e.preventDefault();
        Swal.fire({
        title: '¿Está seguro?',
        text: "Eliminará esta contraindicación",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3f87f5',
        cancelButtonColor: '#de4436',
        confirmButtonText: '<i class="anticon anticon-like"></i> Eliminar',
        cancelButtonText: '<i class="anticon anticon-dislike"></i> Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
           this.submit();
        }
        })
    });
</script>
@endsection
