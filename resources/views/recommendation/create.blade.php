@extends('layouts.main', ['activePage' =>'createRecommendation'], ['tittle' => 'Nueva Recomendación'])
@section('css')
<link rel="stylesheet" href="{{asset('dashboard/vendors/nouislider/nouislider.min.css')}}" >

<link rel="stylesheet" href="{{asset('dashboard/vendors/select2/select2.css')}}">
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header no-gutters">
            <div class="row justify-content-between align-items-md-center">
                <div class="col-md-6">
                    <h2 class="header-title">Nueva Recomendación</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="/home" class="breadcrumb-item"><i class="text-success  anticon anticon-home m-r-5"></i>Inicio</a>
                            <a class="breadcrumb-item" href="/recomendaciones"><i class="text-success anticon anticon-file-protect m-r-5"></i>Recomendaciones</a>
                            <span class="breadcrumb-item active">Nueva Recomendación</span>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('recomendacion.index')}}" class="btn btn-default m-r-5" id="btnEnviar"><i class="fas fa-door-open m-r-5"></i>Volver</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-primary">Registrar Recomendación</h4>
            </div>

            <div class="card-body">
                <form action="{{route('recomendacion.store')}}" method="POST" id="recomendacion">
                    @csrf
                    <p class="text-center font-weight-light m-t-5" style="font-size: 16px">Haciendo uso de su <span class="font-weight-bold">experiencia</span>, complete el siguiente formulario que permitirá ofrecer alternativas de solución para cada <span class="font-weight-bold">malestar</span> que identifique. esta recomendacion será tomada en cuenta en el <span class="font-weight-semibold text-success text-uppercase">test médico</span>.</p>
                    <div class="form-row m-t-25">
                        <div class="form-group col-md-4">
                            <label for="nombreRecomendacion"><span class="h6">Nombre del malestar:</span></label>
                            <input type="text" class="form-control" id="nombreRecomendacion" name="nombreRecomendacion" placeholder="Nombre del malestar" autocomplete="off"  value="{{@old('nombreRecomendacion', $recommendation->nombreRecomendacion)}}">
                            @error('nombreRecomendacion')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="parte_id" data-toggle="tooltip" data-placement="top" title="Parte del cuerpo donde se presentan los síntomas." ><span class="h6">Parte del cuerpo:</span></label>
                            <select name="parte_id" id="parte_id" class="select2">
                                <option></option>
                                @foreach ($parts as $id => $part)
                                    <option value="{{$id}}">{{$part}}</option>
                                @endforeach
                            </select>
                            @error('parte_id')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="sintomas" data-toggle="tooltip" data-placement="top" title="Principales sintomas que se presentan en el malestar." ><span class="h6">Sintomas:</span></label>
                            <select name="sintomas[]" multiple="multiple" id="sintomas" class="select2" >
                                <option></option>
                                @foreach ($symptoms as $id => $symptom)
                                    <option value="{{$id}}">{{$symptom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="medicamentos" data-toggle="tooltip" data-placement="top" title="Seleccione los medicamentos que permiten sobrellevar dicho malestar." ><span class="h6">Medicamentos:</span></label>
                        <select name="medicamentos[]" multiple="multiple" id="medicamentos" class="select2">
                            <option></option>
                            @foreach ($medicines as $medicine)
                                <option value="{{$medicine->id}}">{{$medicine->nombreMedicamento}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row m-b-25">
                        <div class="col-md-4">
                            <label for="dosis" data-toggle="tooltip" data-placement="top" title="Según los medicamentos anteriores, defina la dosis a tomar." ><span class="h6">Dosis:</span></label>
                            <input type="text" class="form-control" id="dosis" name="dosis" placeholder="Ej: dos tabletas" autocomplete="off" value="{{@old('dosis', $recommendation->dosis)}}">
                            @error('dosis')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-4">
                            <label for="frecuencia" data-toggle="tooltip" data-placement="top" title="Según los medicamentos anteriores, defina la frecuencia con que se deben tomar."><span class="h6">Frecuencia:</span></label>
                            <input type="text" class="form-control" id="frecuencia" name="frecuencia" placeholder="Ej: cada 8 horas" autocomplete="off" value="{{@old('frecuencia', $recommendation->frecuencia)}}">
                            @error('frecuencia')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-4">
                            <label for="tiempo"><span class="h6" data-toggle="tooltip" data-placement="top" title="Según los medicamentos anteriores, defina el tiempo que se deben tomar.">Tiempo:</span></label>
                            <input type="text" class="form-control" id="tiempo" name="tiempo" placeholder="Ej: por dos días" autocomplete="off" value="{{@old('tiempo', $recommendation->tiempo)}}">
                            @error('tiempo')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="form-row m-b-25">
                        <div class="col-md-6">
                            <label for="step-slider-intensidad"  data-toggle="tooltip" data-placement="top" title="Establezca el maximo de dolor en el que se puede tomar en cuenta esta recomencación."><span class="h6">Intensidad de dolor:</span></label>
                            <div class="m-t-30 container">
                                <div id="steps-slider-intensidad" class="m-b-20" ></div>
                                <input type="number" min="1" max="12" step="1" id="input-with-keypress-0" class="form-control float-right" name="intensidad" placeholder="Minima" style="width: 110px;" value="{{@old('intensidad', $recommendation->intensidad)}}">
                                @error('intensidad')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="step-slider-edad" data-toggle="tooltip" data-placement="top" title="De igual manera, defina el rango de edad para poder usar esta recomendación."><span class="h6">Rango de edad:</span></label>
                            <div class="m-t-30 container">
                                <div id="step-slider-edad" class="m-b-20"></div>
                                <div class="d-flex justify-content-between">
                                    <input type="number" min="1" max="80"  id="input-edad-keypress-0" class="form-control " name="edadMin" placeholder="Minima" style="width: 110px;" value="{{@old('edadMin', $recommendation->edadMin)}}">
                                    @error('edadMin')<span class="text-danger">{{$message}}</span>@enderror
                                    <input type="number" min="1" max="80"  id="input-edad-keypress-1" class="form-control  float-right" name="edadMax" placeholder="Máxima" style="width: 110px;" value="{{@old('edadMax', $recommendation->edadMax)}}" >
                                    @error('edadMax')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="enfermedades"><span class="h6" data-toggle="tooltip" data-placement="top" title="Se refiere a evitar esta recomendacion cuando el cliente tenda las siguientes enfermedades.">Contraindicaciones:</span></label>
                            <select name="enfermedades[]" id="enfermedades" multiple="multiple" class="select2">
                                <option></option>
                                @foreach ($diseases as $disease)
                                <option value="{{$disease->id}}">{{$disease->nombreEnfermedad}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="imc_id"><span class="h6" data-toggle="tooltip" data-placement="top" title="Clasifique esta recomendación  respecto al Indice de Masa Corporal de cada persona.">Imc:</span></label>
                            <select name="imc_id" id="imc_id"  class="custom-select">
                                <option class="text-muted" value="">Seleccione...</option>
                                @foreach ($imcs as  $id => $imc)
                                <option value="{{$id}}">{{$imc}}</option>
                                @endforeach
                            </select>
                            @error('imc_id')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-4">
                            <label for="enfermedades"><span class="h6" data-toggle="tooltip" data-placement="top" title="Comentarios adicionales a tener en cuenta.">Información adicional:</span></label>
                            <textarea name="informacionAdicional" id="informacionAdicional" class="form-control" style="height: 40px" value="{{@old('informacionAdicional', $recommendation->informacionAdicional)}}"></textarea>
                            @error('informacionAdicional')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Agregar recomendación</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-sm" id="sintoma-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h5 text-primary">Sintomas</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
               <form id="register-sintoma" action="{{route('sintoma.create')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nombreSintoma">Nombre Sintoma</label>
                        <input type="text" class="form-control" id="nombreSintoma" name="nombreSintoma" placeholder="Nombre sintoma" autocomplete="off">
                    </div>
                    <div class="row">
                        <div class="col-md 12 text-right">
                            <button type="button" id="close" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm" id="enviarSintoma">Agregar</button>
                        </div>
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-sm" id="contrain-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h5 text-primary">Contraindicación</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="register-contrain" method="POST" action="{{route('contrain.create')}}">
                    @csrf
                    <div class="form-group">
                     <label for="nombreEnfermedad">Nombre contraindicación</label>
                        <input type="text" class="form-control" id="nombreEnfermedad" name="nombreEnfermedad" placeholder="Nombre contraindicación" autocomplete="off">
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="button" id="close" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary btn-sm" id="enviarContrain">Agregar</button>
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
<script src="{{asset('dashboard/vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('js/validation/createRecommendationValidation.js')}}"></script>
<script src="{{asset('dashboard/vendors/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('dashboard/vendors/wnumb-1.2.0/wNumb.min.js')}}"></script>
<script src="{{asset('js/validation/createRecommendationValidation.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection

