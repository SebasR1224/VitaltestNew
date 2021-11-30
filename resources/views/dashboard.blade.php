@extends('layouts.main' , ['activePage' => 'dashboard'])

@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Tablero</h2>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-blue">
                                <i class="anticon anticon-dollar"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">${{number_format($suma, 2)}}</h2>
                                <p class="m-b-0 text-muted">Lucro</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                <i class="anticon anticon-line-chart"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">{{$porcent}}%</h2>
                                <p class="m-b-0 text-muted">Medicamentos en oferta</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-gold">
                                <i class="anticon anticon-profile"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">{{$reports}}</h2>
                                <p class="m-b-0 text-muted">Reportes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-purple">
                                <i class="anticon anticon-user"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">{{$users}}</h2>
                                <p class="m-b-0 text-muted">Usuarios</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Estadisticas test médico</h5>
                            <div>
                                <div class="btn-group">
                                    <button class="btn btn-default active">
                                        <span>Año</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-50" style="height: 330px">
                            <canvas class="chart" id="revenue-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="m-b-0">Usuarios</h5>
                        <div class="m-v-60 text-center" style="height: 200px">
                            <canvas class="chart" id="customers-chart"></canvas>
                        </div>
                        <div class="row border-top p-t-25">
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                    <div class="media align-items-center">
                                        <span class="badge badge-success badge-dot m-r-10"></span>
                                        <div class="m-l-5">
                                            <h4 class="m-b-0">{{$clientes}}</h4>
                                            <input type="hidden" value="{{$clientes}}" id="clientes">
                                            <p class="m-b-0 muted">Clientes</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                    <div class="media align-items-center">
                                        <span class="badge badge-secondary badge-dot m-r-10"></span>
                                        <div class="m-l-5">
                                            <h4 class="m-b-0">{{$farmaceuticos}}</h4>
                                            <input type="hidden" value="{{$farmaceuticos}}" id="farmaceuticos">

                                            <p class="m-b-0 muted">Farmacéuticos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                    <div class="media align-items-center">
                                        <span class="badge badge-warning badge-dot m-r-10"></span>
                                        <div class="m-l-5">
                                            <h4 class="m-b-0">{{$gerentes}}</h4>
                                            <input type="hidden" value="{{$gerentes}}" id="gerentes">

                                            <p class="m-b-0 muted">Gerentes</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="m-b-0">${{number_format($suma, 2)}}</h2>
                                <p class="m-b-0 text-muted">Beneficio alto</p>
                            </div>
                            <div>
                                <span class="badge badge-pill badge-cyan font-size-12">
                                    <span class="font-weight-semibold m-l-5">+5.7%</span>
                                </span>
                            </div>
                        </div>
                        <div class="m-t-50" style="height: 375px">
                             <canvas class="chart" id="avg-profit-chart"></canvas>
                        </div>
                        <input type="hidden" id="junio" value="{{$junio}}">
                        <input type="hidden" id="julio" value="{{$julio}}">
                        <input type="hidden" id="agosto" value="{{$agosto}}">
                        <input type="hidden" id="septiembre" value="{{$septiembre}}">
                        <input type="hidden" id="octubre" value="{{$octubre}}">
                        <input type="hidden" id="noviembre" value="{{$noviembre}}">
                        <input type="hidden" id="diciembre" value="{{$diciembre}}">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                       <div class="d-flex justify-content-between align-items-center">
                            <h5>Productos Top</h5>
                            @can('product_index')
                            <div>
                                <a href="{{route('medicines.index')}}" class="btn btn-sm btn-default">Ver todos</a>
                            </div>
                            @endcan
                        </div>
                        <div class="m-t-30">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Descuento</th>
                                            <th>Precio Oferta</th>
                                            <th style="max-width: 70px">Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($medicinesDescuento as $descuento)
                                        <tr>
                                            <td>
                                                <div class="media align-items-center">
                                                    <div class="avatar avatar-image rounded">
                                                        <img src="{{$descuento->imagen}}" alt="">
                                                    </div>
                                                    <div class="m-l-10">
                                                        <div>{{$descuento->nombreMedicamento}}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$descuento->descuento}} <span class="text-primary">%</span></td>
                                            <td>{{number_format($descuento->precioDescuento, 2)}}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if ($descuento->status == 1)
                                                    <div class="progress progress-sm w-100 m-b-0">
                                                        <div class="progress-bar bg-success" style="width: 100%"></div>
                                                    </div>
                                                    <div class="m-l-10">
                                                        100
                                                    </div>
                                                    @else
                                                    <div class="progress progress-sm w-100 m-b-0">
                                                        <div class="progress-bar bg-danger" style="width: 20%"></div>
                                                    </div>
                                                    <div class="m-l-10">
                                                        0
                                                    </div>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="m-b-0">Ultimos reportes</h5>
                            <div>
                                <a href="javascript:void(0);" class="btn btn-sm btn-default">Ver todos</a>
                            </div>
                        </div>
                        <div class="m-t-30">
                            <div class="overflow-y-auto scrollable relative" style="height: 437px">
                                <div class="m-b-25">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="media align-items-center">
                                            <div class="font-size-35">
                                                <i class="anticon anticon-file-word text-primary"></i>
                                            </div>
                                            <div class="m-l-15">
                                                <h6 class="m-b-0">
                                                    <a class="text-dark" href="javascript:void(0);">Project Requirement.doc</a>
                                                </h6>
                                                <p class="text-muted m-b-0">1.6MB</p>
                                            </div>
                                        </div>
                                        <div class="dropdown dropdown-animated scale-left">
                                            <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown">
                                                <i class="anticon anticon-ellipsis"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <button class="dropdown-item" type="button">
                                                    <i class="anticon anticon-eye"></i>
                                                    <span class="m-l-10">View</span>
                                                </button>
                                                <button class="dropdown-item" type="button">
                                                    <i class="anticon anticon-download"></i>
                                                    <span class="m-l-10">Download</span>
                                                </button>
                                                <button class="dropdown-item" type="button">
                                                    <i class="anticon anticon-delete"></i>
                                                    <span class="m-l-10">Remove</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Usuarios Recientes</h5>
                            @can('user_index')
                                <div>
                                    <a href="{{route('users.index')}}" class="btn btn-sm btn-default">Ver todos</a>
                                </div>
                            @endcan
                        </div>
                        <div class="m-t-30">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre de usuario</th>
                                            <th>Correo</th>
                                            <th>Rol</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($resentUsers as $user)
                                        <tr>
                                            <td>#{{$user->id}}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <h6 class="m-l-10 m-b-0">{{$user->username}}</h6>
                                                    </div>
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
                                            <td>
                                                @if ($user->status == 1)
                                                <div class="d-flex align-items-center">
                                                    <span class="badge badge-success badge-dot m-r-10"></span>
                                                    <span>Activo</span>
                                                </div>
                                                @else
                                                <div class="d-flex align-items-center">
                                                    <span class="badge badge-danger badge-dot m-r-10"></span>
                                                    <span>Inactivo</span>
                                                </div>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    <script src="{{asset('dashboard/vendors/chartjs/Chart.min.js')}}"></script>

    <script src="{{asset('dashboard/js/pages/dashboard-default.js')}}"></script>
@endsection
