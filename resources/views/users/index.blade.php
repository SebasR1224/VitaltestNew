@extends('layouts.main', ['activePage' =>'users'])
@section('css')
    {{-- Datatable css --}}
    <link href="{{asset('dashboard/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="page-header">
                <h2 class="header-title">Lista ordenada</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
                        <span class="breadcrumb-item active">Usuarios</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    @if (session('messageUser'))
                        <script>
                                swal("Aviso","{!! Session::get('messageUser') !!}" , "success", {
                                button: "Ok",
                            })
                        </script>
                    @endif
                    <h3 class="text-success">Lista de usuarios</h3>
                    <div class="row m-b-30">
                        <div class="col-lg-12 text-right">
                            <a href="{{route('users.create')}}" class="btn btn-success">
                                <i class="anticon anticon-user-add m-r-5"></i>
                                <span>Nuevo usuario</span>
                            </a>
                        </div>
                    </div>
                    <div class="m-t-25">
                        <table id="data-table" class="table">
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
                                            {{$user->id}}
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
                                        <td class="text-right">
                                            <a href="{{route('users.edit', ['id'=>$user->id])}}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                <i class="anticon anticon-edit"></i>
                                            </a>
                                            <a href="{{route('users.show', ['id'=> $user->id]) }}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right" >
                                                <i class="anticon anticon-eye"></i>
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
            confirmButtonColor: '#00c9a7',
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

    {{-- Mensajes de session (confirmacion) --}}
    @if (session('message_status'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        text: "{!! Session::get('message_status') !!}",
        showConfirmButton: false,
        timer: 1300
        })
    </script>
    @endif

     {{-- Datatabla js --}}
     <script src="{{asset('dashboard/vendors/datatables/jquery.dataTables.min.js')}}"></script>
     <script src="{{asset('dashboard/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
     <script>
         $('#data-table').DataTable({
             responsive:true,
             autoWidth: false,
            "language": {
            "lengthMenu": "Mostrar"+
                          `<select class=" custom-select custom-select-sm form-control form-control-sm">
                              <option value = "10">10</option>
                              <option value = "25">25</option>
                              <option value = "50">50</option>
                              <option value = "100">100</option>
                              <option value = "-1">Todos</option>
                          </select>` +
                          "registros por página",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            'search': 'Buscar:',
            'paginate': {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
            }
         });
     </script>
@endsection
