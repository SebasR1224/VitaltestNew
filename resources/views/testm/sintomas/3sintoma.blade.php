
@extends('layouts.main', ['activePage' =>'test'], ['tittle' => 'test'])

<link rel="stylesheet" href="{{asset('test/css/style2.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <link rel="stylesheet" href="{{asset('test/css/estilos.css')}}">
      <link rel="stylesheet" href="{{asset('test/css/font-awesome.css')}}">

      <script src="{{asset('test/js/jquery-3.2.1.js')}}"></script>
      <script src="{{asset('test/js/script.js')}}"></script>


   <script>
      const slider = document.querySelector('input');
      const value = document.querySelector(".value");
      value.textContent= slider.value;
      slider.oninput=function(){
          value.textContent=this.value;
      }
  </script>
@section('content')


<div class="page-container">
        <div class="main-content">
    <div class="container2">
        <div class="card2">
          <div class="right-column">
            <div class="containerin">
                <div class="contenedorB">
                    <center>
                    <div class="progreso-contenedor">

                        <div class="progreso" id="progreso"></div>
                        <div class="circulo active">1</div>
                        <div class="circulo active">2</div>
                        <div class="circulo active">3</div>
                        <div class="circulo">4</div>
                        <div class="circulo">R</div>

                    </div>
                </center>
                </div>
                <div class="title">Sintomas que presenta...</div>

                <form action="{{ route('testm') }}"  method="POST">
                @csrf
                <div class="user-detaills">
                        <div class="input-boxx">
                            <h4>Seleccione el primer sintoma que tiene:</h4>
                        <select id="sintoma1" name="sintoma1" class="custom-select" required>
                            <option selected value="">Seleccione...</option>
                            @foreach ($Csintomas as $Csintoma)
                            <option value="{{$Csintoma->nombreSintoma}}">{{$Csintoma->nombreSintoma}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="input-boxx">
                            <h4>Seleccione el segundo sintoma que tiene:</h4>
                            <select id="sintoma2" name="sintoma2" class="custom-select" required>
                                <option selected value="">Seleccione...</option>
                                @foreach ($Csintomas as $Csintoma)
                                <option value="{{$Csintoma->nombreSintoma}}">{{$Csintoma->nombreSintoma}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-boxx">
                            <h4>Seleccione el tercer sintoma que tiene:</h4>
                            <select id="sintoma3" name="sintoma3" class="custom-select" required>
                                <option selected value="">Seleccione...</option>
                                @foreach ($Csintomas as $Csintoma)
                                <option value="{{$Csintoma->nombreSintoma}}">{{$Csintoma->nombreSintoma}}</option>
                                @endforeach
                            </select>
                        </div>

                </div>
                <div class="title">Que intensidad presenta...</div><br>
                    <p> La forma que emplearemos para medir su intensidad de dolor es la EVA o escala visual analógica,
                        que consiste en una línea con dos extremos, en donde 3 corresponde con un dolor leve,6 corresponde con un dolor medio y
                        9 el máximo dolor imaginable;entre estos dos puntos se encuentran divisiones en milímetros..
                    </p>
                    <center>

                        <div class="value">3</div>
                        <input type="range"  name="intensidad" min="3" max="9" step="3" value="3">

                    </center>

                <input type="hidden" id="partc" name="partc" type="text" class="form-control" value="{{$partes}}" >
                <input type="hidden" id="nsintoma" name="nsintoma" type="text" class="form-control" value="{{$nsintoma}}" >

                <center>
                    <a href="/tests" button class="button button2 tabindex="5">Reintentar</a>
            <button type="submit"  button class="button button2" tabindex="4">Siguiente</button>
        </center>
            </form>
            </div>
          </div>
        </div>
    </div>

    </div>
</div>
<script>
    var elem = document.querySelector('input[type="range"]');

var rangeValue = function(){
  var newValue = elem.value;
  var target = document.querySelector('.value');
  target.innerHTML = newValue;
}

elem.addEventListener("input", rangeValue)
</script>
@endsection
