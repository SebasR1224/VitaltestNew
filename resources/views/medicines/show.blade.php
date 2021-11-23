@extends('layouts.main', ['activePage' =>'showMedicines'])
@section('content')
<div class="page-container">
        <div class="main-content">
            <div class="page-header no-gutters has-tab">
                <div class="justify-content-between align-items-md-center">
                    <h2 class="header-title">Detalles de producto</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="/home" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
                            <a class="breadcrumb-item" href="/medicines"><i class="anticon anticon-medicine-box  m-r-5"></i></i>Inventario</a>
                            <span class="breadcrumb-item active">Información Detallada</span>
                        </nav>
                    </div>
                </div>
                <hr>
                <div class="d-md-flex m-b-15 align-items-center justify-content-between">
                    <div class="media align-items-center m-b-15">
                        <div class="avatar avatar-image rounded" style="height: 70px; width: 70px">
                            <img src="{{$medicamento->imagen}}" alt="">
                        </div>
                        <div class="m-l-15">
                            <h4 class="m-b-0">{{$medicamento->nombreMedicamento}}</h4>
                            <p class="text-muted m-b-0">Codigo: #{{$medicamento->id}}</p>
                        </div>
                    </div>
                    <div class="m-b-15">
                        <a href="{{route('medicines.edit', $medicamento->id)}}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Editar este producto">
                            <i class="anticon anticon-edit"></i>
                            <span>Editar</span>
                        </a>
                        <a href="{{route('medicines.index')}}" class="btn btn-default m-r-5" id="btnEnviar" data-toggle="tooltip" data-placement="top" title="Volver a inventario"><i class="fas fa-door-open m-r-5"></i>Volver</a>
                    </div>
                </div>
                <ul class="nav nav-tabs" >
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#product-overview">Información completa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#product-images">Imagen del producto</a>
                    </li>
                </ul>
            </div>
            <div class="container-fluid">
                <div class="tab-content m-t-15">
                    <div class="tab-pane fade show active" id="product-overview" >
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <i class="font-size-40 text-success anticon anticon-smile"></i>
                                            <div class="m-l-15">
                                                <p class="m-b-0 text-muted">10 valoraciones</p>
                                                <div class="star-rating m-t-5">
                                                    <input type="radio" id="star3-5" name="rating-3" value="5" checked disabled/><label for="star3-5" title="5 star"></label>
                                                    <input type="radio" id="star3-4" name="rating-3" value="4" disabled/><label for="star3-4" title="4 star"></label>
                                                    <input type="radio" id="star3-3" name="rating-3" value="3" disabled/><label for="star3-3" title="3 star"></label>
                                                    <input type="radio" id="star3-2" name="rating-3" value="2" disabled/><label for="star3-2" title="2 star"></label>
                                                    <input type="radio" id="star3-1" name="rating-3" value="1" disabled/><label for="star3-1" title="1 star"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <i class="font-size-40 text-primary anticon anticon-shopping-cart"></i>
                                            <div class="m-l-15">
                                                <p class="m-b-0 text-muted">Ventas</p>
                                                <h3 class="m-b-0 ls-1">1,521</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <i class="font-size-40 text-primary anticon anticon-message"></i>
                                            <div class="m-l-15">
                                                <p class="m-b-0 text-muted">Reseñas</p>
                                                <h3 class="m-b-0 ls-1">27</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <i class="font-size-40 text-primary anticon anticon-stock"></i>
                                            <div class="m-l-15">
                                                <p class="m-b-0 text-muted">Stock disponible</p>
                                                <h3 class="m-b-0 ls-1">152</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Información Basica</h4>
                                <div class="table-responsive">
                                    <table class="product-info-table m-t-20">
                                        <tbody>
                                            <tr>
                                                <td>Precio:</td>
                                                <td class="text-success font-weight-semibold">$ {{number_format($medicamento->precioNormal, 2)}}</td>
                                            </tr>
                                            @if ($medicamento->precioDescuento)
                                                <tr>
                                                    <td>Descuento:</td>
                                                    <td class="text-dark font-weight-semibold">{{$medicamento->descuento}}%</td>
                                                </tr>
                                                <tr>
                                                    <td>Oferta:</td>
                                                    <td class="text-danger">$ {{number_format($medicamento->precioDescuento, 2)}}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td>Catergoria:</td>
                                                <td>	{{$medicamento->categoria->nombreCategoria}}</td>
                                            </tr>
                                            <tr>
                                                <td>Laboratorio:</td>
                                                <td>{{$medicamento->laboratorio->nombreLaboratorio}}</td>
                                            </tr>
                                            <tr>
                                                <td>Estado:</td>
                                                <td>
                                                    <span class="badge badge-pill {{$medicamento->status == 1 ? 'badge-cyan' : 'badge-red'}}">{{$medicamento->status == 1 ? 'En stock' : 'Agotado'}}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Descripción del Producto</h4>
                            </div>
                            <div class="card-body">
                                <div class="accordion" id="accordion-default">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">
                                                <a data-toggle="collapse" href="#collapseOneDefault">
                                                    <span>Licencia</span>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOneDefault" class="collapse show" data-parent="#accordion-default">
                                            <div class="card-body">
                                                {{$medicamento->licencia}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">
                                                <a class="collapsed" data-toggle="collapse" href="#collapseTwoDefault">
                                                    <span>Aviso legal</span>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwoDefault" class="collapse" data-parent="#accordion-default">
                                            <div class="card-body">
                                                {{$medicamento->avisoLegal}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">
                                                <a class="collapsed" data-toggle="collapse" href="#collapseThreeDefault">
                                                    <span>Ficha técnica</span>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseThreeDefault" class="collapse" data-parent="#accordion-default">
                                            <div class="card-body">
                                                {{$medicamento->fichaTecnica}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-images">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                        <img class="img-fluid" src="{{$medicamento->imagen}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="javascript:void(0);" class="btn-list" data-toggle="modal" data-target="#list-medicines">
                <i class="anticon anticon-ordered-list"></i>
            </a>
            @livewire('show-medicines')
        </div>
    </div>
@endsection()
