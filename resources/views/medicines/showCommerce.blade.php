@extends('layouts.main', ['activePage' =>'inventory'])
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header no-gutters">
            <div class="row justify-content-between align-items-md-center">
                <div class="col-md-6">
                    <h2 class="header-title">Detalles</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
                            <a class="breadcrumb-item" href="#">Usuarios</a>
                            <span class="breadcrumb-item active">Vista previa</span>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('medicines.commerce')}}" class="btn btn-default m-r-5" id="btnEnviar"><i class="fas fa-door-open m-r-5"></i>Volver</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 border">
                            <div class="d-flex align-items-center">
                                <img  src="{{$medicamento->imagen}}" class="w-100" style="height: 500px" alt="">
                            </div>
                            @if ($medicamento->descuento)
                                <h1 class="text-desc badge badge-danger" style="font-size:15px">{{$medicamento->descuento}}%</h1>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h5 class="h5 text-muted font-italic">{{$medicamento->laboratorio->nombreLaboratorio}}</h5>
                            <h4 class="m-b-10 text-success m-t-5 m-b-15">{{$medicamento->nombreMedicamento}}</h4>
                            @if ($medicamento->precioDescuento)
                            <div class="d-flex align-items-center ">
                                <h1 class="h1 font-weight-bold text-danger">${{number_format($medicamento->precioDescuento, 2)}} (Oferta)</h1>
                            </div>
                            <div class="d-flex align-items-center m-t-5 m-b-15">
                                <h3 class="h3 text-muted"><del>${{number_format($medicamento->precioNormal, 2)}}</del>(Normal)</h3>
                            </div>
                            @else
                            <div class="d-flex align-items-center m-t-5 m-b-15">
                                <h1 class="h1 text-dark">${{number_format($medicamento->precioNormal, 2)}} (Normal)</h1>
                            </div>
                            @endif
                            <hr>
                            <div class="h5 d-flex align-items-center m-t-5 m-b-15">
                                <i class="fas fa-motorcycle p-10 text-success"></i>
                                Entregas a domicilio
                            </div>
                            <div class="h6 d-flex align-items-center  p-10">
                                Cantidad:
                            </div>
                            <div class="h6 d-flex align-items-center m-t-5 m-b-15 p-10">
                                <select name="" id="" class="custom-select" style="width: 100px">
                                    <option value="">1</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                </select>
                            </div>
                            <div class="h6 d-flex align-items-center m-t-5 m-b-15 p-10">
                                <button class="btn btn-success"><i class="anticon anticon-shopping-cart"></i> Agregar al carrito</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="h6 text-muted text-uppercase">{{$medicamento->licencia}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <ul class="nav nav-tabs nav-justified" id="myTabJustified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-success" id="home-tab-justified" data-toggle="tab" href="#home-justified" role="tab" aria-controls="home-justified" aria-selected="true">FICHA TÉCNICA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-success" id="profile-tab-justified" data-toggle="tab" href="#profile-justified" role="tab" aria-controls="profile-justified" aria-selected="false">AVISO LEGAL</a>
                            </li>
                        </ul>
                        <div class="tab-content m-t-15" id="myTabContentJustified">
                            <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab-justified">
                                <p>{{$medicamento->fichaTecnica}}</p>
                            </div>
                            <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab-justified">
                                <p>{{$medicamento->avisoLegal}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <p class="text-center h4 font-weight-bold text-success p-10">Clientes que vieron este producto también compraron</p>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <div class="row">
                        @foreach ($categories as $category )
                        <div class="col-md-3">
                            <div class="card">
                                <div class="box-text">
                                    <img class="card-img-top w-100" style="height:320px" src="{{$category->imagen}}" alt="">
                                    @if ($category->descuento)
                                        <h1 class="text-desc badge badge-danger" style="font-size:15px">{{$category->descuento}}%</h1>
                                    @endif
                                </div>
                                    <div class="card-body">
                                    <p class="text-muted text-uppercase font-italic short-text"><small>{{$category->laboratorio->nombreLaboratorio}}</small></p>
                                    <h4 class="text-success h4 short-text">{{$category->nombreMedicamento}}</h4>
                                    <div class="d-block align-items-center justify-content-between">
                                        @if ($category->precioDescuento)
                                            <h4 class="text-danger font-weight-bold h4">${{number_format($category->precioDescuento, 2)}}(Oferta)</h4>
                                            <div>
                                                <p><del>${{number_format($category->precioNormal, 2)}}</del>(Normal)</p>
                                            </div>
                                        @else
                                            <h4 class="text-dark h4">${{number_format($category->precioNormal, 2)}}(Normal)</h4>
                                            <div>
                                                <p class="invisible">vacio</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div>
                                        <a href="{{route('commerce-show', $category->id)}}" class="btn btn-block btn-success"><i class="far fa-check-circle"></i> VER DETALLES</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
