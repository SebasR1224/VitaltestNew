@extends('layouts.main', ['activePage' =>'newProduct'])
@section('css')
<link rel="stylesheet" href="{{asset('dashboard/vendors/select2/select2.css')}}">
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header no-gutters">
            <div class="row justify-content-between align-items-md-center">
                <div class="col-md-6">
                    <h2 class="header-title">Nuevo Producto</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="/home" class="breadcrumb-item"><i class="text-success  anticon anticon-home m-r-5"></i>Inicio</a>
                            <a class="breadcrumb-item" href="/medicines"><i class="text-success anticon anticon-medicine-box  m-r-5"></i></i>Inventario</a>
                            <span class="breadcrumb-item active">Nuevo Producto</span>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('medicines.index')}}" class="btn btn-default m-r-5" id="btnEnviar"><i class="fas fa-door-open m-r-5"></i>Volver</a>
                </div>
            </div>
        </div>
        <form action="{{route('medicines.store')}}" method="POST" enctype="multipart/form-data" class="row" id="form-medicines">
            @csrf
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title text-primary">
                            Registrar Producto
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="font-weight-light">Formulario de registro para medicamentos</p>
                        <div class="m-t-25">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="nombreMedicamento"><span class="h6">Nombre del medicamento:</span></label>
                                    <input type="text" class="form-control" id="nombreMedicamento" name="nombreMedicamento" placeholder="Nombre del medicamento" value="{{@old('nombreMedicamento', $medicamento->nombreMedicamento)}}" autofocus autocomplete="off">
                                    @error('nombreMedicamento')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="categoria_id"><span class="h6">Categoria:</span></label>
                                        <select name="categoria_id" id="categoria_id" class="select2">
                                            <option></option>
                                            @foreach ($categories as $id => $category)
                                                <option value="{{$id}}">{{$category}}</option>
                                            @endforeach
                                        </select>
                                        @error('categoria_id')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="laboratorio_id"><span class="h6">Laboratorio:</span></label>
                                        <select name="laboratorio_id" id="laboratorio_id" class="select2">
                                            <option></option>
                                            @foreach ($laboratories as $id => $laboratory)
                                                <option value="{{$id}}">{{$laboratory}}</option>
                                            @endforeach
                                        </select>
                                        @error('laboratorio_id')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                     <label for="precioNormal"><span class="h6">Precio:</span></label>
                                    <div class="input-group mb-3">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text text-success">$</span>
                                         </div>
                                         <input type="number" class="form-control" id="precioNormal" name="precioNormal" placeholder="Precio normal" value="{{@old('precioNormal', $medicamento->precioNormal)}}" autocomplete="off">
                                         @error('precioNormal')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <label for="descuento"><span class="h6">Descuento:</span></label>
                                     <div class="input-group mb-3">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text text-success">-</span>
                                         </div>
                                         <input type="number" class="form-control" id="descuento" name="descuento" id="descuento" placeholder="Descuento" value="{{@old('descuento', $medicamento->descuento)}}"
                                         autocomplete="off">
                                         @error('descuento')<span class="text-danger">{{$message}}</span>@enderror
                                         <div class="input-group-append">
                                             <span class="input-group-text text-success">%</span>
                                         </div>
                                     </div>
                                </div>
                                <div class="col-md-4">
                                     <label for="precioDescuento"><span class="h6">Precio con descuento:</span></label>
                                     <input type="hidden" class="form-control" id="precioDescuento" name="precioDescuento">
                                     <div class="form-control text-muted" disabled id="disabled">Precio con descuento</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="licencia"><span class="h6">Licencia:</span></label>
                                    <input type="text" class="form-control" id="licencia" name="licencia" value="{{@old('licencia', $medicamento->licencia)}}" autocomplete="off">
                                    @error('licencia')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="fichaTecnica"><span class="h6">Ficha tecnica:</span></label>
                                    <textarea class="form-control" id="fichaTecnica" name="fichaTecnica" aria-label="With textarea"></textarea>
                                    @error('fichaTecnica')<span class="text-danger">{{$message}}</span>@enderror
                                    <div class="text-right"><span id="caracteresFichaTecnica" class="valid-text pt-3" id="txaCount"></span></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="avisoLegal"><span class="h6">Aviso legal:</span></label>
                                    <textarea class="form-control" id="avisoLegal" name="avisoLegal" aria-label="With textarea"></textarea>
                                    @error('avisoLegal')<span class="text-danger">{{$message}}</span>@enderror
                                    <div class="text-right"><span id="caracteresAvisoLegal" class="valid-text pt-3" id="txaCount"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="from-group row">
                            <div class="col-lg-12">
                                <label for="nombreMedicamento"><span class="h6">Imagen del medicamento:</span></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imagen" name="imagen" accept="image/*">
                                    <label class="custom-file-label text-primary" for="imagen"><i class="anticon anticon-upload m-r-10"></i>Añadir imagen</label>
                                    <span id="ErrorImagen" class="valid-text pt-3" id="txaCount"></span>
                                    @error('imagen')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="m-t-10">
                            <div class="d-flex justify-content-center">
                                <div class="align-items-center" >
                                    <img id="imageSelected"  class="d-block w-100"  style="height:476px">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row m-t-30">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary" id="btnEnviar">Agregar producto</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade bd-example-modal-sm" id="category-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h5 text-primary">Categoria</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
               <form id="register-category" action="{{route('category.create')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nombreCategoria">Nombre Categoria</label>
                        <input type="text" class="form-control" id="nombreCategoria" name="nombreCategoria" placeholder="Nombre categoria">
                    </div>
                    <div class="row">
                        <div class="col-md 12 text-right">
                            <button type="button" id="close" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm" id="enviarCategory">Agregar</button>
                        </div>
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-sm" id="laboratory-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h5 text-primary">Laboratorio</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="register-laboratory" method="POST" action="{{route('laboratory.create')}}">
                    @csrf
                    <div class="form-group">
                     <label for="nombreLaboratorio">Nombre laboratorio</label>
                        <input type="text" class="form-control" id="nombreLaboratorio" name="nombreLaboratorio" placeholder="Nombre laboratorio">
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="button" id="close" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary btn-sm" id="enviarLaboratory">Agregar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('dashboard/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>
<script src="{{asset('js/validation/createMedicinesValidation.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('dashboard/vendors/select2/select2.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('#categoria_id').select2({
        placeholder: "Seleccione...",
        formatNoMatches: function () {
        return "Sin resultado <a href='#' onclick='alertCategory()'>Click</a> para agregar categoria";
        }
    });

    $('#laboratorio_id').select2({
        placeholder: "Seleccione...",
        formatNoMatches: function () {
        return "Sin resultado  <a href='#' onclick='alertLaboratory()'>Click</a> para agregar laboratorio";
        }
    });

    function alertLaboratory(){
        $("#laboratory-modal").modal("show");
    }

    function alertCategory(){
        $("#category-modal").modal("show");
    }
</script>
@endsection
