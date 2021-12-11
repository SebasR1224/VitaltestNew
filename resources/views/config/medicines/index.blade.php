@extends('layouts.main', ['activePage' =>'configMedicines'], ['tittle' => 'Categorias | Labotatorios'])
@section('css')
    <link href="{{secure_asset('dashboard/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <div class="row justify-content-between align-items-md-center">
                <div class="col-md-6">
                    <h2 class="header-title">Campos adicionales productos</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="/home" class="breadcrumb-item"><i class="text-success anticon anticon-home m-r-5"></i>Inicio</a>
                            <a class="breadcrumb-item" href="/medicines"><i class="text-success anticon anticon-medicine-box  m-r-5"></i></i>Inventario</a>
                            <span class="breadcrumb-item active">Campos adicionales productos</span>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('medicines.index')}}" class="btn btn-default m-r-5" id="btnEnviar" data-toggle="tooltip" data-placement="left" title="Volver a inventario" ><i class="fas fa-door-open m-r-5"></i>Volver</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row m-b-30">
                                <h3 class=" col-lg-6 text-success">Lista de Categorias</h3>
                                <div class="col-lg-6 text-right">
                                    @can('category_create')
                                        <button type="button" data-toggle="modal" data-target="#createCategory" class="btn btn-primary">
                                            <i class="anticon anticon-appstore m-r-5"></i>
                                            <span>Nueva categoria</span>
                                        </button>

                                    @endcan
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="data-table" class="table table-hover e-commerce-table">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre categoria</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>
                                                    #{{$category->id}}
                                                </td>
                                                <td><h6 class="m-b-0 m-l-10">{{$category->nombreCategoria}}</h6></td>
                                                <td class="text-center">
                                                    @can('category_edit')
                                                    <span data-toggle="tooltip" data-placement="left" title="Editar categoria">
                                                        <button type="button"  data-toggle="modal" data-target="#editCategory{{$category->id}}" style="font-size: 17px"  class="btn btn-icon btn-hover text-warning btn-sm btn-rounded pull-right">
                                                            <i class="anticon anticon-edit"></i>
                                                        </button>
                                                    </span>
                                                        <div class="modal fade" id="editCategory{{$category->id}}">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title text-success" id="exampleModalCenterTitle">Editar Categoria</h5>
                                                                        <button type="button" class="close" data-dismiss="modal">
                                                                            <i class="anticon anticon-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <form action="{{route('category.update', $category->id)}}" method="post" id="edit-category">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="nombreCategoria">Nombre de la categoria:</label>
                                                                                <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control" value="{{$category->nombreCategoria}}" placeholder="Nombre categoria" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                            <button type="submit" class="btn btn-success">Editar categoria</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endcan
                                                    @can('category_U_delete')
                                                        <form action="{{route('category.delete', $category->id)}}" class="d-inline delete-category" method="post">
                                                        @csrf
                                                        <button type="submit" style="font-size: 17px"  class="btn btn-icon btn-hover text-danger btn-sm btn-rounded pull-right" data-toggle="tooltip" data-placement="left" title="Eliminar categoria">
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
                                            <th>Nombre categoria</th>
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
                                <h3 class=" col-lg-6 text-success">Lista de Laboratorios</h3>
                                <div class="col-lg-6 text-right">
                                    @can('laboratory_create')
                                        <button type="button" data-toggle="modal" data-target="#createLaboratory" class="btn btn-primary">
                                            <i class="anticon anticon-experiment m-r-5"></i>
                                            <span>Nuevo laboratorio</span>
                                        </button>
                                    @endcan
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="data-table" class="table table-hover e-commerce-table">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre laboratorio</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($laboratories as $laboratory)
                                            <tr>
                                                <td>
                                                    #{{$laboratory->id}}
                                                </td>
                                                <td><h6 class="m-b-0 m-l-10">{{$laboratory->nombreLaboratorio}}</h6></td>
                                                <td class="text-center">
                                                    @can('laboratory_edit')
                                                    <span data-toggle="tooltip" data-placement="left" title="Editar laboratorio">
                                                        <button type="button"  style="font-size: 17px" data-toggle="modal" data-target="#editLaboratory{{$laboratory->id}}" class="btn btn-icon btn-hover text-warning btn-sm btn-rounded pull-right" >
                                                            <i class="anticon anticon-edit"></i>
                                                        </button>
                                                    </span>
                                                        <div class="modal fade" id="editLaboratory{{$laboratory->id}}">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title text-success" id="exampleModalCenterTitle">Editar Laboratorio</h5>
                                                                        <button type="button" class="close" data-dismiss="modal">
                                                                            <i class="anticon anticon-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <form action="{{route('laboratory.update', $laboratory->id)}}" method="post" id="edit-laboratory">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="nombreLaboratorio">Nombre del laboratorio:</label>
                                                                                <input type="text" class="form-control" name="nombreLaboratorio" id="nombreLaboratorio" placeholder="Nombre laboratorio" value="{{$laboratory->nombreLaboratorio}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                            <button type="submit" class="btn btn-success">Editar laboratorio</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endcan
                                                    @can('laboratory_U_delete')
                                                    <form action="{{route('laboratory.delete', $laboratory->id)}}" class="d-inline delete-laboratory" method="post">
                                                       @csrf
                                                        <button type="submit" style="font-size: 17px"  class="btn btn-icon btn-hover text-danger btn-sm btn-rounded pull-right" data-toggle="tooltip" data-placement="left" title="Eliminar categoria">
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
                                            <th>Nombre laboratorio</th>
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
@can('category_create')
    <div class="modal fade" id="createCategory">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalCenterTitle">Agregar Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <form action="{{route('category.storeAdd')}}" method="post" id="create_category">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="nombreCategoria">Nombre de la categoria:</label>
                            <input type="text" class="form-control" name="nombreCategoria" id="nombreCategoria" autocomplete="off" placeholder="Nombre categoria">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar categoria</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcan
@can('laboratory_create')
    <div class="modal fade" id="createLaboratory">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  text-primary" id="exampleModalCenterTitle">Agregar Laboratorio</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <form action="{{route('laboratory.storeAdd')}}" method="POST" id="create_Laboratory">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombreLaboratorio">Nombre del laboratorio:</label>
                            <input type="text" class="form-control" name="nombreLaboratorio" id="nombreLaboratorio" placeholder="Nombre laboratorio" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerar</button>
                        <button type="submit" class="btn btn-primary">Agregar laboratorio</button>
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
    <script src="{{secure_asset('js/validation/configMedicines.js')}}"></script>


    {{-- Alertas de confirmacion estado --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.delete-category').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Está seguro?',
            text: "Eliminará esta categoria",
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
    $('.delete-laboratory').submit(function(e){
        e.preventDefault();
        Swal.fire({
        title: '¿Está seguro?',
        text: "Eliminará este laboratorio",
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
