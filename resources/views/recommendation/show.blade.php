@extends('layouts.main', ['activePage' =>'showRecommendation'], ['tittle' => 'Destalles Recomendación | ' . $recommendation->nombreRecomendacion])
@section('css')

@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header no-gutters">
            <div class="row justify-content-between align-items-md-center">
                <div class="col-md-6">
                    <h2 class="header-title">Detalles Recomendación</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="/home" class="breadcrumb-item"><i class="text-success anticon anticon-home m-r-5"></i>Inicio</a>
                            <a class="breadcrumb-item" href="/recomendaciones"><i class="text-success anticon anticon-usergroup-add m-r-5"></i>Recomendaciones</a>
                            <span class="breadcrumb-item active">Detalles Recomendación</span>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('recomendacion.edit', $recommendation->id)}}" class="btn btn-success m-r-5"><i class="anticon anticon-edit m-r-5"></i>Editar</a>
                    <a href="{{route('recomendacion.index')}}" class="btn btn-default m-r-5" id="btnEnviar"><i class="fas fa-door-open m-r-5"></i>Volver</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="m-b-0 card-title text-center text-success">{{$recommendation->nombreRecomendacion}}</h2>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="media align-items-center">
                                    <h4 class="m-b-0 card-title text-center"></h4>
                                </div>
                                <div>
                                    <span class="badge badge-pill badge-blue">In Progress</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Sintomas:</h6>
                                    @foreach ($recommendation->sintomas as $sintomas)
                                        <span class="badge badge-pill m-t-10 badge-default font-weight-normal m-r-10 m-b-10">{{$sintomas->nombreSintoma}}</span>
                                    @endforeach
                                </div>
                                <div class="col-md-6">
                                    <div class="d-md-flex m-t-10 align-items-center justify-content-between">
                                        <div class="d-flex align-items-center m-t-10">
                                            <span class="text-dark font-weight-semibold m-r-10 m-b-5">Parte del cuerpo:
                                                <span class="font-weight-light">{{$recommendation->parte->nombreParte}}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-15">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#project-details-tasks">Medicamentos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#project-details-comments">Información adicional</a>
                                </li>
                            </ul>
                            <div class="tab-content m-t-15 p-25">
                                <div class="tab-pane fade show active" id="project-details-tasks">
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <p class="text-black-50 content">para la recomendación <strong>{{$recommendation->nombreRecomendacion}}</strong> los medicamentos que aliviaran el malestar son:</p>
                                            @foreach ($recommendation->medicamentos as $medicines)
                                            <a href="{{route('medicines.show', $medicines->id)}}" class="file" style="min-width: 200px;">
                                                <div class="media align-items-center">
                                                    <div class="avatar avatar-icon  rounded m-r-15">
                                                        <img src="{{$medicines->imagen}}" alt="">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">{{$medicines->nombreMedicamento}}</h6>
                                                        <span class="font-size-13 text-muted">{{$medicines->categoria->nombreCategoria}}</span>
                                                    </div>
                                                </div>
                                            </a>
                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            <p class="text-black-50 content">Necesario tomarlos teniedo en cuentas las siguientes especificaciones:</p>
                                            <div class="table-responsive">
                                                <table class="product-info-table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="font-weight-semibold"><i class="text-success fas fa-thermometer m-r-5"></i> Dosis:</td>
                                                            <td >{{$recommendation->dosis}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-semibold"><i class="text-success fas fa-sync-alt m-r-5"></i>Frecuencia:</td>
                                                            <td>{{$recommendation->frecuencia}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-semibold"><i class="text-success anticon anticon-clock-circle m-r-5"></i>Tiempo:</td>
                                                            <td>{{$recommendation->tiempo}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="project-details-comments">
                                    <p class="text-black-50">Señ@r farmaceutico, para la recomendación <span class="font-weight-bold">{{$recommendation->nombreRecomendacion}}</span> los consejos son </p>
                                    <div class="card">
                                        <div class="card-body">
                                            <p>{{$recommendation->informacionAdicional}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-center">Especificaciones</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-black-50 content">Para que esta recomendación se muestre es necesario que los usuarios cumplan con las siguientes condiciones.</p>
                            <label>Intensidad:</label>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width:{{$recommendation->intensidad}}0%" aria-valuenow="{{$recommendation->intencidad}}" aria-valuemin="0" aria-valuemax="12">{{$recommendation->intensidad}}</div>
                            </div>
                            <input disabled class="form-control float-right" style="width: 40px;" value="{{$recommendation->intensidad}}">
                            <div class="m-t-50">
                                <label >Rango de edad:</label>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width:{{$recommendation->edadMin}}%" aria-valuenow="{{$recommendation->edadMin}}" aria-valuemin="0" aria-valuemax="12">{{$recommendation->edadMin}}</div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width:{{$recommendation->edadMax}}%" aria-valuenow="{{$recommendation->edadMax}}" aria-valuemin="0" aria-valuemax="12">{{$recommendation->edadMax}}</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <input disabled class="form-control" style="width: 50px;" value="{{$recommendation->edadMin}}">
                                    <input disabled class="form-control float-right" style="width: 50px;" value="{{$recommendation->edadMax}}">
                                </div>
                            </div>
                            <div class="m-t-25">
                                <label class="m-r-10">Imc:</label>
                                <span>{{$recommendation->imc->nombreImc}}</span>
                            </div>
                            <div class="m-t-10">
                                <label class="m-r-10">Sexo:</label>
                                @if ($recommendation->sexo == 1)
                                    <span>Mujer</span>
                                @else
                                    <span>Hombre</span>
                                @endif
                            </div>
                            <div class="m-t-10">
                            <p class="text-black-50 content m-b-15">Señ@r farmaceutico, en este apartado podrá encontrar en una lista las contraindicaciones que la recomendación <span class="font-weight-bold">{{$recommendation->nombreRecomendacion}}</span> presenta.</p>
                                <label>Contraindicaciones:</label>
                                @forelse ($recommendation->enfermedades as $enfermedades)
                                <div>
                                    <span class="badge badge-pill badge-purple">{{$enfermedades->nombreEnfermedad}}</span>
                                </div>
                                @empty
                                <div>
                                    <span class="badge badge-pill badge-blue">Sin contraindicaciones</span>
                                </div>
                                @endforelse
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
