@extends('layouts.main', ['activePage' =>'inventory'])
@section('css')
    <link href="{{asset('dashboard/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Lista de inventario</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="/home" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
                    <span class="breadcrumb-item active">Inventario</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row m-b-30">
                    <div class="col-lg-8">
                        <h3 class="h3 text-primary">Inventario de productos</h3>
                    </div>
                    <div class="col-lg-4 text-right">
                        <a href="{{route('medicines.create')}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Registrar nuevo producto">
                            <i class="anticon anticon-plus-circle m-r-5"></i>
                            <span>Agregar producto</span>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="data-table" class="table table-hover e-commerce-table">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre de medicamento</th>
                                <th>Categoria</th>
                                <th>Precio</th>
                                <th>Descuento</th>
                                <th>Oferta</th>
                                <th>Laboratorio</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medicines as $medicine )
                                <tr>
                                    <td>
                                        #{{$medicine->id}}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img class="img-fluid rounded" src="{{$medicine->imagen}}" style="max-width: 60px" alt="">
                                            <h6 class="m-b-0 m-l-10">{{$medicine->nombreMedicamento}}</h6>
                                        </div>
                                    </td>
                                    <td>{{$medicine->categoria->nombreCategoria}}</td>
                                    <td>
                                        <span class="text-success">$</span>
                                        {{$medicine->precioNormal}}
                                    </td>
                                    @if ($medicine->descuento)
                                        <td>
                                            {{$medicine->descuento}}
                                            <span class="text-success">%</span>
                                        </td>
                                        <td>
                                            <span class="text-success">$</span>
                                            {{$medicine->precioDescuento}}
                                        </td>
                                    @else
                                        <td class="text-center text-primary" colspan="2">Sin descuento</td>
                                    @endif
                                    <td>{{$medicine->laboratorio->nombreLaboratorio}}</td>
                                    <td>
                                        @if ($medicine->status == 1)
                                        <div class="d-flex align-items-center">
                                            <div class="badge badge-success badge-dot m-r-10"></div>
                                            <div>En Stock</div>
                                        </div>
                                        @else
                                        <div class="d-flex align-items-center">
                                            <div class="badge badge-danger badge-dot m-r-10"></div>
                                            <div>Agotado</div>
                                        </div>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <span class="d-inline-block" data-placement="left" data-toggle="tooltip" title="Editar el precio del producto">
                                            <a type="button" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right" data-toggle="modal" data-target="#modalPrice{{$medicine->id}}">
                                                <i class="anticon anticon-dollar"></i>
                                            </a>
                                        </span>
                                        <a href="{{route('medicines.edit', $medicine->id )}}"  class="btn btn-icon btn-hover btn-sm btn-rounded pull-right" data-toggle="tooltip" data-placement="left" title="Editar este producto">
                                            <i class="anticon anticon-edit"></i>
                                        </a>
                                        <a href="{{route('medicines.show', $medicine->id) }}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right" data-toggle="tooltip" data-placement="left" title="Vista detallada del producto">
                                            <i class="anticon anticon-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modalPrice{{$medicine->id}}">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <i class="anticon anticon-close"></i>
                                                </button>
                                            </div>
                                            <form action="{{route('price.update', $medicine->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="precioNormal" class="col-form-label control-label"><span class="h6">Precio normal:</span></label>
                                                        <input type="text" class="form-control" id="precioNormal" name="precioNormal"  placeholder="Precio normal" autofocus value="{{@old('precioNormal', $medicine->precioNormal)}}" autocomplete="off">
                                                        @error('precioNormal')<span class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="descuento" class="col-form-label control-label"><span class="h6">Descuento:</span></label>
                                                        <input type="text" class="form-control" id="descuento" name="descuento"  placeholder="Descuento" value="{{@old('descuento', $medicine->descuento)}}" autocomplete="off">
                                                        @error('descuento')<span class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="precioDescuento" class="col-form-label control-label"><span class="h6">Precio con descuento:</span></label>
                                                        <input type="hidden" class="form-control" id="precioDescuento" name="precioDescuento">
                                                        <div class="form-control text-muted" disabled id="disabled">Precio con descuento</div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Código</th>
                                <th>Nombre de medicamento</th>
                                <th>Categoria</th>
                                <th>Precio</th>
                                <th>Descuento</th>
                                <th>Oferta</th>
                                <th>Laboratorio</th>
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
    <script src="{{asset('dashboard/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('dashboard/es6/pages/e-commerce-order-list.js')}}"></script>
@endsection
