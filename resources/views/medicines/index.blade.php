@extends('layouts.main', ['activePage' =>'inventory'], ['tittle' => 'Lista de Inventario'])
@section('css')
    <link href="{{asset('dashboard/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Lista de Inventario</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="/home" class="breadcrumb-item"><i class="text-success anticon anticon-home m-r-5"></i>Inicio</a>
                    <span class="breadcrumb-item active">Inventario</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-8 m-t-15">
                        <h3 class="h3 text-success font-weight-semibold">Inventario de productos</h3>
                    </div>
                    <div class="col-lg-4 p-5 text-right">
                        @can('product_config')
                        <a class="btn btn-defauld" href="{{route('config.medicines')}}" data-toggle="tooltip" data-placement="top" title="Ver categorias y laboratorios">
                            <i class="anticon anticon-appstore m-r-5"></i>
                            <i class="anticon anticon-experiment"></i>
                        </a>
                        @endcan
                        @can('product_U_import_excel')
                            <span class="d-inline-block"  data-toggle="tooltip" data-placement="top" title="Carga masiva desde un archivo Excel">
                                <button type="button" class="btn  btn-success" data-toggle="modal" data-target="#modalExcel">
                                    <i class="anticon anticon-file-excel m-r-5"></i> Excel
                                </button>
                            </span>
                        @endcan
                        @can('product_create')
                            <a href="{{route('medicines.create')}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Registrar nuevo producto">
                                <i class="anticon anticon-plus-circle m-r-5"></i>
                                <span>Agregar Producto</span>
                            </a>
                        @endcan
                    </div>
                </div>
            </div>

            <!-- Modal -->
            @can('product_U_export_pdf')
                <div class="modal fade" id="modalPdf">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <i class="anticon anticon-close"></i>
                                </button>
                            </div>
                            <form action="{{route('export-pdf')}}" method="get">
                                <div class="modal-body">
                                    <p class="p-15 h5 font-italic font-weight-light text-dark">Generar reporte cuando los productos esten:</p>
                                    <div class="row container-fluid">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="radio">
                                                    <input id="activo" name="status" value="1" type="radio" checked="">
                                                    <label for="activo">En stock</label>
                                                </div>
                                                <div class="radio">
                                                    <input id="agotado" name="status" value="0" type="radio">
                                                    <label for="agotado">Agotado</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group float-right">
                                                <div class="radio">
                                                    <input id="oferta" name="oferta" value="whereNotNull" type="radio" checked="">
                                                    <label for="oferta">Con descuento</label>
                                                </div>
                                                <div class="radio">
                                                    <input id="sinOferta" name="oferta" value="whereNull" type="radio">
                                                    <label for="sinOferta">Sin Descuento</label>
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
            @endcan
            @can('product_U_import_excel')
                <div class="modal fade" id="modalExcel">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <i class="anticon anticon-close"></i>
                                </button>
                            </div>
                            <form action="{{route('import-excel')}}" method="POST" enctype="multipart/form-data">
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
            @endcan
            <div class="card-body">
                    <div class="text-center mb-3">
                        @can('product_U_export_excel')
                            <a href="{{route('export-excel')}}" class="btn btn-tone btn-success m-r-10" data-toggle="tooltip" data-placement="top" title="Imprimir inventario en Excel"><i class="anticon anticon-file-excel m-r-5"></i>Imprimir Excel</a>
                        @endcan
                        @can('product_U_export_pdf')
                            <span class="d-inline-block"  data-toggle="tooltip" data-placement="top" title="Imprimir inventario en PDF">
                                <button type="button" class="btn btn-tone btn-primary" data-toggle="modal" data-target="#modalPdf">
                                    <i class="anticon anticon-file-pdf m-r-5"></i>Imprimir PDF
                                </button>
                            </span>
                        @endcan
                    </div>

                <div class="table-responsive">
                    <table id="data-table" class="table table-hover e-commerce-table">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre de Medicamento</th>
                                <th>Categoria</th>
                                <th>Precio</th>
                                <th>Descuento</th>
                                <th>Oferta</th>
                                @can('product_status')
                                    <th>Estado</th>
                                @endcan
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
                                        {{number_format($medicine->precioNormal, 2)}}

                                    </td>
                                    <td>
                                        @if ($medicine->descuento)
                                            {{$medicine->descuento}}
                                            <span class="text-primary">%</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($medicine->precioDescuento)
                                            <span class="text-success">$</span>
                                            {{number_format($medicine->precioDescuento, 2)}}
                                        @endif
                                    </td>
                                    @can('product_status')
                                    <td>
                                        <form class="form-update-status" action="{{route('price.status', $medicine->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="d-flex align-items-center">
                                                @if ($medicine->status == 1)
                                                <div class="badge badge-success badge-dot m-r-10"></div>
                                                <span class="d-inline-block"  data-toggle="tooltip" data-placement="top" title="Click para cambiar el estado del producto.">
                                                    <button  class="btn btn-sm btn-default ">
                                                        <div>En Stock</div>
                                                    </button>
                                                </span>
                                                @else
                                                <div class="badge badge-danger badge-dot m-r-10"></div>
                                                <span class="d-inline-block"  data-toggle="tooltip" data-placement="top" title="Click para cambiar el estado del producto.">
                                                    <button   class="btn btn-sm btn-default ">
                                                        <div>Agotado</div>
                                                    </button>
                                                </span>
                                                @endif
                                            </div>
                                        </form>
                                    </td>
                                    @endcan
                                    <td class="text-center">
                                        @can('product_show')
                                            <a style="font-size: 17px" href="{{route('medicines.show', $medicine->id) }}" class="btn btn-icon btn-hover text-primary btn-sm btn-rounded pull-right" data-toggle="tooltip" data-placement="left" title="Información completa del producto">
                                                <i class="anticon anticon-info-circle"></i>
                                            </a>
                                        @endcan
                                        @can('product_edit')
                                            <a style="font-size: 17px" href="{{route('medicines.edit', $medicine->id )}}"  class="btn btn-icon btn-hover text-warning btn-sm btn-rounded pull-right" data-toggle="tooltip" data-placement="left" title="Editar este producto">
                                                <i class="anticon anticon-edit"></i>
                                            </a>
                                        @endcan
                                        @can('product_price')
                                            <span class="d-inline-block" data-placement="left" data-toggle="tooltip" title="Editar el precio del producto">
                                                <a style="font-size: 17px" type="button" class="btn btn-icon btn-hover text-success btn-sm btn-rounded pull-right" data-toggle="modal" data-id="{{$medicine->id}}" data-precio="{{$medicine->precioNormal}}" data-descuento="{{$medicine->descuento}}" data-oferta="{{$medicine->precioDescuento}}" data-target="#modalPrice">
                                                    <i class="anticon anticon-dollar"></i>
                                                </a>
                                            </span>
                                        @endcan
                                    </td>
                                </tr>
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
@can('product_price')
<div class="modal fade" id="modalPrice">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title p text-success font-weight-light" ></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <form id="form-update-price" action="{{route('price.update', 1)}}" data-action="{{route('price.update', 1)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="modal-body" id="modal-body">
                    <div class="form-group">
                        <label for="precioNormal" class="col-form-label control-label"><span class="h6">Precio normal:</span></label>
                        <input type="number" class="form-control" id="precioNormal"  name="precioNormal"  placeholder="Precio normal" autofocus  autocomplete="off">
                        @error('precioNormal')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="descuento" class="col-form-label control-label"><span class="h6">Descuento:</span></label>
                        <input type="number" class="form-control" id="descuento" name="descuento"  placeholder="Descuento"  autocomplete="off">
                        @error('descuento')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="precioDescuento" class="col-form-label control-label"><span class="h6">Precio con descuento:</span></label>
                        <input type="hidden" class="form-control" id="precioDescuento" name="precioDescuento" value="{{@old('precioDescuento', $medicamento->precioDescuento)}}">
                        <div class="form-control" disabled id="disabled"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endcan
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $('.form-update-status').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Está seguro?',
            text: 'Este producto cambiará de estado',
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
    <script src="{{asset('dashboard/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('dashboard/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('dashboard/es6/pages/e-commerce-order-list.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>
    <script src="{{asset('js/validation/indexMedicinesValidation.js')}}"></script>
@endsection
