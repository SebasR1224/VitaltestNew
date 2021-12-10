@extends('layouts.main', ['activePage' =>'roles'], ['tittle' => 'Test médico online'])
@section('css')
<link rel="stylesheet" href="{{asset('dashboard/vendors/nouislider/nouislider.min.css')}}" >
<link rel="stylesheet" href="{{asset('dashboard/vendors/select2/select2.css')}}">
@endsection
@section('content')
<div class="contenedor_loader">
    <div class="loader"></div>
</div>
<div class="page-container">
    <div class="main-content">
        <div class="page-header no-gutters">
            <div class="row justify-content-between align-items-md-center">
                <div class="col-md-6">
                    <h2 class="header-title">Test Médico Online</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="/home" class="breadcrumb-item"><i class="text-success anticon anticon-home m-r-5"></i>Inicio</a>
                            <span class="breadcrumb-item active">Test Médico Online</span>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <a href="/home" class="btn btn-default m-r-5" id="btnEnviar"><i class="fas fa-door-open m-r-5"></i>Volver</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="d-flex">
                        <ul class="nav nav-tabs flex-column" id="myTabVertical" role="tablist">
                            <li class="nav-item" >
                                <a class="nav-link active hello " id="home-tab-vertical" data-toggle="tab" href="#home-vertical" role="tab" aria-controls="home-vertical" aria-selected="true">Introducción</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link iniciar disabled" id="profile-tab-vertical" data-toggle="tab" href="#profile-vertical" role="tab" aria-controls="profile-vertical" aria-selected="false">Términos</a>
                            </li>
                            <li class="nav-item  ">
                                <a class="nav-link sexo disabled" id="contact-tab-vertical" data-toggle="tab" href="#contact-vertical" role="tab" aria-controls="contact-vertical" aria-selected="false">Sexo</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link edad disabled" id="contact-tab-vertical1" data-toggle="tab" href="#contact-vertical1" role="tab" aria-controls="contact-vertical" aria-selected="false">Edad</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link imc disabled" id="contact-tab-vertical2" data-toggle="tab" href="#contact-vertical2" role="tab" aria-controls="contact-vertical" aria-selected="false">Imc</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link contrain disabled" id="contact-tab-vertical3" data-toggle="tab" href="#contact-vertical3" role="tab" aria-controls="contact-vertical" aria-selected="false">Contraindicaciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link parte disabled" id="contact-tab-vertical4" data-toggle="tab" href="#contact-vertical4" role="tab" aria-controls="contact-vertical" aria-selected="false">Zona afectada</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link sintomas disabled" id="contact-tab-vertical5" data-toggle="tab" href="#contact-vertical5" role="tab" aria-controls="contact-vertical" aria-selected="false">Sintomas</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10">
                    <form action="{{route('result-test')}}" method="POST" class="tab-content m-l-15 formTest" id="myTabContentVertical">
                        @csrf
                        <div class="tab-pane fade show active" id="home-vertical" role="tabpanel" aria-labelledby="home-tab-vertical">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5 offset-6">
                                            <img class="w-100 m-t-10 float-right" src="{{asset('dashboard/images/others/doctor.svg')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="m-t-50 m-b-70">
                                        <div class="col-md-8">
                                            <h4 class="font-weight-bold text-success font-italic">¡Bienvenido!</h4>
                                            <p class="m-t-10" style="font-size: 16px">Está a punto de realizar un chequeo médico corto (2 minutos), seguro y anónimo. Sus respuestas serán analizadas cuidadosamente y dependiendo de los síntomas y el malestar que presente, se determinará una posible solución con medicamentos.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="start" class="btn btn-success float-right">Empezar</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-vertical" role="tabpanel" aria-labelledby="profile-tab-vertical">
                            <div class="card">
                                <div class="card-body">
                                    <img class="w-40 m-t-20 float-right" src="{{asset('dashboard/images/others/terms.svg')}}" alt="">
                                    <h4 class="m-t-50 m-l-20 font-italic text-success">Términos de servicio</h4>
                                    <ul class="m-l-20 m-t-20 font-weight-light" style="font-size: 16px">
                                        <li><strong class="font-weight-semibold">Test de caracter informativo.</strong> El chequeo tiene finalidad informativa y no sustituye la opinión de un médico.</li>
                                        <li class="m-t-15"><strong class="font-weight-semibold">No lo use en emergencias.</strong> En caso de emergencia de salud, llame a su número de emergencia local de inmediato.</li>
                                        <li class="m-t-15"><strong class="font-weight-semibold">Tus datos están seguros.</strong>  La información que proporciona es anónima y no se comparte con nadie.</li>

                                        <div class="checkbox m-t-50 col-md-6">
                                            <input id="checkbox1" class="form-check-input" type="checkbox">
                                            <label for="checkbox1">Leí y acepto los <span class="text-primary">Términos de servicio</span>  y <span class="text-primary">la Política de privacidad </span> .</label>
                                        </div>
                                        <div class="checkbox col-md-6">
                                            <input id="checkbox2" class="form-check-input" type="checkbox">
                                            <label for="checkbox2">Acepto el procesamiento de mi información médica con el propósito de realizar el test médico.</label>
                                        </div>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="atrasTerminos" class="btn btn-default ">Atrás</button>
                                    <button type="button" class="btn btn-success float-right" disabled id="btnconttaval">Siguiente</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact-vertical" role="tabpanel" aria-labelledby="contact-tab-vertical">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h3 class="text-center m-t-50 mb-5">¿Cuál es su sexo?</h3>
                                    <label for="mujer">
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="radio" name="sexo" id="mujer" value="1" class="form-check-sexo" checked>
                                            <span>
                                                <i class="anticon anticon-woman m-r-5 m-l-5"></i>
                                            </span>
                                            <span>
                                                Mujer
                                            </span>
                                            </div>
                                        </div>
                                    </label>
                                    <label for="hombre">
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="radio" name="sexo" id="hombre" value="2" class="form-check-sexo">
                                                <span>
                                                    <i class="anticon anticon-man"></i>
                                                </span>
                                                <span>
                                                    Hombre
                                                </span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="atrasSexo" class="btn btn-default ">Atrás</button>
                                    <button type="button" id="sexo" class="btn btn-success float-right">Siguiente</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact-vertical1" role="tabpanel" aria-labelledby="contact-tab-vertical1">
                            <div class="card">
                               <div class="card-body">
                                <h3 class="text-center m-t-50 mb-5">¿Qué edad tiene?</h3>
                                   <div class="container">
                                    <div id="steps-slider-edad"></div>
                                    <input type="number" min="1" max="80"  id="input-with-keypress-0" class="form-control float-right mt-5" name="edad"  style="width: 110px;">
                                   </div>
                               </div>
                               <div class="card-footer">
                                    <button type="button" id="atrasEdad" class="btn btn-default ">Atrás</button>
                                    <button type="button" id="edad" class="btn btn-success float-right">Siguiente</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact-vertical2" role="tabpanel" aria-labelledby="contact-tab-vertical2">
                            <div class="card">
                               <div class="card-body">
                                <h3 class="text-center m-t-50 mb-5">Indice de masa corporal</h3>
                                <p class="mb-5 text-center font-weight-light" style="font-size: 16px" >Introduzca el valor de su estatura y peso, para suministrar una solución mas precisa.</p>
                                   <div class="container">
                                       <div class="row mb-5">
                                           <div class="col-md-4">
                                               <label for="estatura">Estatura: Metros</label>
                                            <input type="number" id="estatura" name="estatura" class="form-control" placeholder="Estatura">
                                           </div>
                                           <div class="col-md-4">
                                            <label for="estatura">Peso: Kilogramos</label>
                                            <input type="number" id="peso" name="peso" class="form-control" placeholder="Peso">
                                           </div>
                                           <div class="col-md-4">
                                            <label for="estatura">Imc:</label>
                                            <div class="form-control" id="div">...</div>
                                        </div>
                                       </div>
                                        <input type="hidden" name="imc" id="imc">
                                   </div>
                               </div>
                               <div class="card-footer">
                                    <button type="button" id="atrasImc" class="btn btn-default ">Atrás</button>
                                    <button type="button" id="btnImc" class="btn btn-success float-right">Siguiente</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact-vertical3" role="tabpanel" aria-labelledby="contact-tab-vertical3">
                            <div class="card">
                               <div class="card-body">
                                <h3 class="text-center m-t-50 ">Por favor, compruebe todos los enunciados abajo que se apliquen a usted.</h3>
                                <p class="mb-5 text-center font-weight-light" style="font-size: 16px" >Escoja una respuesta en cada fila.</p>
                                <div class="table-responsive container">
                                    <table class="table">
                                        <tbody>
                                            @foreach ($contraindicaiones as $contra )
                                                <tr>
                                                    <td>Tengo {{$contra->nombreEnfermedad}}</td>
                                                    <td>
                                                        <div class="checkbox">
                                                            <input id="{{$contra->id}}" type="checkbox" name="contraindicaiones[]" value="{{$contra->id}}">
                                                            <label for="{{$contra->id}}">Sí</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                               <div class="card-footer">
                                    <button type="button" id="atrasContrain" class="btn btn-default ">Atrás</button>
                                    <button type="button" id="contrain" class="btn btn-success float-right">Siguiente</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact-vertical4" role="tabpanel" aria-labelledby="contact-tab-vertical4">
                            <div class="card">
                               <div class="card-body">
                                    <img src="{{asset('dashboard/images/others/cuerpo.jpeg')}}" class="float-right w-40"  alt="">
                                    <h3 class="text-center m-t-50">Seleccione la parte del cuerpo</h3>
                                    <p class="mb-5 text-center container font-weight-light" style="font-size: 15px" >
                                        Utilice el buscador para seleccionar la zona afectada donde presenta el malestar.
                                    </p>
                                    <select name="parte" id="partes" class="select2" style="width: 500px">
                                        <option></option>
                                        @foreach ($partes as $parte)
                                            <option value="{{$parte->id}}">{{$parte->nombreParte}}</option>
                                        @endforeach
                                    </select>
                               </div>
                               <div class="card-footer">
                                    <button type="button" id="atrasParte" class="btn btn-default ">Atrás</button>
                                    <button type="button" id="parte" class="btn btn-success float-right">Siguiente</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact-vertical5" role="tabpanel" aria-labelledby="contact-tab-vertical5">
                            <div class="card">
                                <div class="card-body">
                                 <h3 class="text-center m-t-50 mb-5">Introduzca sus síntomas</h3>
                                 <p class="mb-5 text-center font-weight-light" style="font-size: 16px" >Utilice la búsqueda. Agregue tantos síntomas como pueda para obtener resultados más precisos.</p>
                                    <div class="container mb-5">
                                        <select name="sintomas[]" multiple id="sintomas" class="select2">
                                            <option></option>
                                            @foreach ($sintomas as $sintoma)
                                                <option value="{{$sintoma->id}}">{{$sintoma->nombreSintoma}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="container mb-5">
                                        <h5>Intensidad:</h5>
                                        <p class="font-weight-light" style="font-size: 16px" >Teniendo en cuenta la respuesta anterior, Especifique el grado de intensidad que presentan dichos sintomas.</p>
                                        <div id="steps-slider-intensidad"></div>
                                        <input type="number" min="1" max="12"  step="1" id="intensidad-with-keypress-0" class="form-control float-right mt-5" name="intensidad"  style="width: 110px;">
                                    </div>
                                </div>
                                <div class="card-footer">
                                     <button type="button" id="atrasSintomas" class="btn btn-default ">Atrás</button>
                                     <button type="submit" class="btn btn-success float-right">Terminar</button>
                                 </div>
                             </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>
    <script src="{{asset('dashboard/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('dashboard/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('dashboard/vendors/nouislider/nouislider.min.js')}}"></script>
    <script src="{{asset('dashboard/vendors/wnumb-1.2.0/wNumb.min.js')}}"></script>
    <script src="{{asset('js/validation/testValidation.js')}}"></script>
@endsection
