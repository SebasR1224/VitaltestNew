@extends('layouts.main', ['activePage' =>'roles'], ['tittle' => 'Resultados del test'])
@section('content')
<div class="contenedor_loader">
    <div class="loader"></div>
</div>
<div class="page-container">
    <div class="main-content">
        <div class="page-header no-gutters">
            <div class="row justify-content-between align-items-md-center">
                <div class="col-md-6">
                    <h2 class="header-title">Resultados</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="/test-medico" class="breadcrumb-item"><i class="text-success anticon anticon-heart m-r-5"></i>Test médico</a>
                            <span class="breadcrumb-item active">Resultados</span>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <a href="/test-medico" class="btn btn-default m-r-5" id="btnEnviar"><i class="fas fa-door-open m-r-5"></i>Volver</a>
                </div>
            </div>
        </div>
        <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 bg-success d-flex justify-content-center align-items-center">
                                <i class="text-white anticon anticon-alert" style="font-size: 100px"></i>

                            </div>
                            <div class="col-md-10 m-t-15">
                                <h5 class="text-muted font-weight-light">Recomendación</h5>
                                <h4 class="m-b-50 m-t-20 text-success">Malestar general: <span class="font-weight-light text-dark">{{$recomendacion->nombreRecomendacion}}</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                      Información
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="font-weight-semibold text-warning">Zona afectada</h6>
                    <div class="alert alert-primary">
                        {{$recomendacion->parte->nombreParte}}
                    </div>
                    <h6 class="font-weight-semibold text-warning">Sintomas</h6>
                    <ul class="list-group list-group-flush">
                        @foreach ($recomendacion->sintomas as  $sintoma)
                            <li class="list-group-item">
                                <div class="d-flex align-items-center">
                                        <div class="progress">
                                            <div class="progress-bar {{$recomendacion->intensidad > 6 ? 'bg-warning' :  'bg-primary'}} " role="progressbar" style="width: {{$recomendacion->intensidad}}0%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    <div class="m-l-10">
                                        <div class="m-b-0 text-success font-weight-light font-size-17">{{$sintoma->nombreSintoma}}</div>
                                        @if ($recomendacion->intensidad > 6)
                                            <div class="m-b-0 opacity-07 font-size-13">Evidencia avanzada</div>
                                        @else
                                            <div class="m-b-0 opacity-07 font-size-13">Evidencia moderada</div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <h6 class="font-weight-semibold text-warning m-t-20">Contraindicaciones</h6>
                    @forelse ($recomendacion->enfermedades as $enfer)
                        <span class="badge badge-pill badge-purple">{{$enfer->nombreEnfermedad}}</span>
                    @empty
                    <span class="badge badge-pill badge-default">Sin contraindicaciones</span>
                    @endforelse
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                   <div class="card-title">
                    Solución
                   </div>
                </div>
                <div class="card-body">
                    <p>Por favor, tenga en cuenta que la lista podría no ser completa y que la información proporcionada tiene una finalidad informativa y no se corresponde con una opinión médica real.</p>
                    <div class="row mt-5">
                        <div class="col-md-6">
                            @foreach ($recomendacion->medicamentos as $medicines)
                                <a href="{{route('commerce-show', $medicines->id)}}" class="file" style="min-width: 200px;">
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
                            <p class="text-black-50 content" style="font-size: 17px">Necesario tomarlos teniedo en cuentas las siguientes especificaciones:</p>
                            <div class="table-responsive">
                                <table class="product-info-table">
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-semibold"><i class="text-success fas fa-thermometer m-r-5"></i> Dosis:</td>
                                            <td >{{$recomendacion->dosis}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-semibold"><i class="text-success fas fa-sync-alt m-r-5"></i>Frecuencia:</td>
                                            <td>{{$recomendacion->frecuencia}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-semibold"><i class="text-success anticon anticon-clock-circle m-r-5"></i>Tiempo:</td>
                                            <td>{{$recomendacion->tiempo}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($recomendacion->informacionAdicional != null)
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Información adicional</div>
                </div>
                <div class="card-body">
                    <p style="font-size: 17px">{{$recomendacion->informacionAdicional}}</p>
                </div>
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Resumen</div>
                </div>
                <div class="card-body">
                    <div class="container m-t-20">
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#list-response" style="font-size: 17px" class="float-right">Mostar</a>
                        Sus respuestas
                    </div>
                    <hr>
                    <div class="container m-t-20">
                        <div  style="font-size: 17px" class="float-right">{{$num}}+</div>
                        Diagnósticos que han sido considerados
                    </div>
                    <hr>
                    <div class="container m-t-20">
                        <div  style="font-size: 17px" class="float-right">1 min 22 s</div>
                        Duración de la sesión
                    </div>
                    <hr>

                    <a href="{{route('test.index')}}" class="btn btn-success">Empezar de nuevo</a>
                </div>
            </div>

        </div>

    </div>
</div>
<div class="modal modal-right fade quick-view" id="list-response">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-between align-items-center">
                <h5 class="modal-title  text-primary font-weight-semibold">Sus respuestas</h5>
            </div>
            <div class="modal-body scrollable">

                <h6 class="text-success" > Sexo</h6>
                    <div>
                        @if ($recomendacion->sexo == 1)
                            Mujer
                        @else
                            Hombre
                        @endif
                    </div>
                    <h6 class="text-success mt-5"> Edad</h6>
                    <div>{{$edad}} años</div>

                <h6  class="text-success mt-5">Imc</h6>
                <div>
                    {{$nombreImc->nombreImc}}
                </div>
                <h6  class="text-success mt-5">Parte del cuerpo</h6>
                <div>
                    {{$recomendacion->parte->nombreParte}}
                </div>
                <h6  class="text-success mt-5">Sintomas</h6>
                <div>
                    <ol>
                        @foreach ($recomendacion->sintomas as $sintom )
                            <li>{{$sintom->nombreSintoma}}</li>
                        @endforeach
                    </ol>
                </div>
                <h6  class="text-success mt-5">Intensidad</h6>
                <div>
                    <div class="progress">
                        <div class="progress-bar {{$recomendacion->intensidad > 6 ? 'bg-warning' :  'bg-primary'}} " role="progressbar" style="width: {{$recomendacion->intensidad}}0%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">{{$recomendacion->intensidad}}</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>
    window.addEventListener('load', () =>{
    const contenedor_loader = document.querySelector('.contenedor_loader')
    contenedor_loader.style.opacity = 0
    contenedor_loader.style.visibility = 'hidden'
})
</script>

@endsection
