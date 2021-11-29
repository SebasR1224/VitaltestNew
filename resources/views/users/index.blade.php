@extends('layouts.main', ['activePage' =>'users'])
@section('css')
    {{-- Datatable css --}}
    <link href="{{asset('dashboard/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="page-header">
                <h2 class="header-title">Lista de usuarios</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="/home" class="breadcrumb-item"><i class="text-success anticon anticon-home m-r-5"></i>Inicio</a>
                        <span class="breadcrumb-item active">Usuarios</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-8 m-t-15">
                            <h3 class="h3 text-success font-weight-semibold">Comunidad Vitaltest</h3>
                        </div>
                        <div class="col-lg-4 p-5 text-right">
                            <span class="d-inline-block"  data-toggle="tooltip" data-placement="top" title="Carga masiva desde un archivo Excel">
                                <button type="button" class="btn  btn-success" data-toggle="modal" data-target="#modalExcel">
                                    <i class="anticon anticon-file-excel m-r-5"></i> Excel
                                </button>
                            </span>
                            <a href="{{route('users.create')}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Agregar usuario">
                                <i class="anticon anticon-user-add m-r-5"></i>
                                <span>Nuevo usuario</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modalPdf">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <i class="anticon anticon-close"></i>
                                </button>
                            </div>
                            <form action="{{route('export-users-pdf')}}" method="get">
                                <div class="modal-body">
                                    <p class="p-15 h5 font-italic font-weight-light text-dark">Generar reporte cuando los usuarios esten:</p>
                                    <div class="row container-fluid">
                                        <div class="col-md-6">
                                            <div class="form-group m-t-20">
                                                <div class="radio">
                                                    <input id="activo" name="status" value="1" type="radio" checked="">
                                                    <label for="activo">Activos</label>
                                                </div>
                                                <div class="radio">
                                                    <input id="agotado" name="status" value="0" type="radio">
                                                    <label for="agotado">Inactivos</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group float-right">
                                                <div class="radio">
                                                    <input id="cliente" name="roles" value="3" type="radio" checked="">
                                                    <label for="cliente">Cliente</label>
                                                </div>
                                                <div class="radio">
                                                    <input id="farmaceutico" name="roles" value="2" type="radio">
                                                    <label for="farmaceutico">Farmacéutico</label>
                                                </div>
                                                <div class="radio">
                                                    <input id="gerente" name="roles" value="1" type="radio">
                                                    <label for="gerente">Gerente</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary"> <i class="anticon anticon-download m-r-5"></i> Descargar PDF</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modalExcel">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <i class="anticon anticon-close"></i>
                                </button>
                            </div>
                            <form action="{{route('import-users-excel')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <p class="container-fluid h5 font-weight-light text-dark">Seleccionar un archivo:</p>
                                    <div class="container-fluid">
                                        <div class="custom-file">
                                            <input type="file" name="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label text-success" for="customFile">Archivo excel « .xlsx »</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-success"> <i class="anticon anticon-download m-r-5"></i>Importar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (isset($errors) && $errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error )
                                {{$error}}
                            @endforeach
                        </div>
                    @endif
                    @if (session()->has('failures'))
                      <table class="table table-danger">
                            <tr>
                                <th>Fila</th>
                                <th>Atributo</th>
                                <th>Errors</th>
                                <th>Valor</th>
                            </tr>
                            @foreach (session()->get('failures') as $validation)
                                <tr>
                                    <td>{{$validation->row()}}</td>
                                    <td>{{$validation->attribute()}}</td>
                                    <td>
                                        <ul>
                                            @foreach ($validation->errors() as $e)
                                                <li>{{$e}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                       {{$validation->values()[$validation->attribute()]}}
                                    </td>
                                </tr>
                            @endforeach
                      </table>
                    @endif
                    <div class="text-center mb-3">
                        <a href="{{route('export-users-excel')}}" class="btn btn-tone btn-success m-r-10" data-toggle="tooltip" data-placement="top" title="Imprimir lista de usuarios en Excel"><i class="anticon anticon-file-excel m-r-5"></i>Imprimir Excel</a>
                        <span class="d-inline-block"  data-toggle="tooltip" data-placement="top" title="Imprimir lista de usuarios en PDF">
                            <button type="button" class="btn btn-tone btn-primary" data-toggle="modal" data-target="#modalPdf">
                                <i class="anticon anticon-file-pdf m-r-5"></i>Imprimir PDF
                            </button>
                        </span>
                </div>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-hover e-commerce-table">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre de usuario</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th>Fecha de creación</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user )
                                    <tr>
                                        <td>
                                            #{{$user->id}}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{-- <img class="img-fluid rounded" src="assets/images/others/thumb-9.jpg" style="max-width: 60px" alt=""> --}}
                                                <h6 class="m-b-0 m-l-10">{{$user->username}}</h6>
                                            </div>
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @forelse ($user->roles as $role )
                                                <span class="badge badge-pill badge-{{$role->name == "Cliente" ? 'gold' : ($role->name == "Gerente" ? 'geekblue' : 'green')}}">{{$role->name}}</span>
                                            @empty
                                                <span class="badge badge-red">Usuario sin rol</span>
                                            @endforelse
                                        </td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            <form action="{{route('update.status', $user->id)}}" method="POST" class="d-inline form-update">
                                                @csrf
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-{{$user->status == 1 ? 'success' : 'danger'}} badge-dot m-r-10"></div>

                                                    @forelse ($user->roles as $role)
                                                        @if ($role->id == 1)
                                                            <div class="btn btn-sm text-{{$user->status == 1 ? 'success' : 'danger'}}" disabled>{{$user->status == 1 ? 'Activo' : 'Inactivo'}}</div>
                                                        @else
                                                            <button class="btn btn-sm text-{{$user->status == 1 ? 'success' : 'danger'}}"  type="submit">{{$user->status == 1 ? 'Activo' : 'Inactivo'}}</button>
                                                        @endif
                                                    @empty
                                                    <button class="btn btn-sm text-{{$user->status == 1 ? 'success' : 'danger'}}" type="submit">{{$user->status == 1 ? 'Activo' : 'Inactivo'}}</button>
                                                    @endforelse
                                                </div>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <a style="font-size: 17px" href="{{route('users.show', ['id'=> $user->id]) }}" class="btn btn-icon btn-hover text-primary btn-sm btn-rounded pull-right" >
                                                <i class="anticon anticon-eye"></i>
                                            </a>
                                            <a style="font-size: 17px" href="{{route('users.edit', ['id'=>$user->id])}}" class="btn btn-icon btn-hover text-warning btn-sm btn-rounded pull-right">
                                                <i class="anticon anticon-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre de usuario</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th>Fecha de creacion</th>
                                    <th>Estado</th>
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

    {{-- Alertas de confirmacion estado --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.form-update').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Está seguro?',
            text: "Cambiará el estado del usuario",
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
     {{-- Datatabla js --}}
     <script src="{{asset('dashboard/vendors/datatables/jquery.dataTables.min.js')}}"></script>
     <script src="{{asset('dashboard/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('dashboard/es6/pages/e-commerce-order-list.js')}}"></script>
@endsection
