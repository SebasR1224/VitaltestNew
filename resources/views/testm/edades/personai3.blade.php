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
                        <div class="circulo active">4</div>
                        <div class="circulo ">R</div>

                    </div>
                </center>
                </div>
                <div class="title">Informacion el la persona...</div>
                <br>

                <form action="{{ route('testm') }}"  method="POST">
                @csrf
                <div class="user-detaills">
                        <div class="input-boxx">
                            <h4>Escriba su edad:</h4>
                            <input type="number" name="edad" id="edad" placeholder="Edad" required>
                        </div>
                        <div class="input-boxx">
                            <h4>Escriba su estatura en cm:</h4>
                            <input type="text" name="estatura" id="estatura" placeholder="Estatura en cm" required>
                        </div>
                        <div class="input-boxx">
                            <h4>Escriba su peso en kg:</h4>
                            <input type="number" name="peso" id="peso" placeholder="Peso en kg" required>
                        </div>

                </div><br><br>
                <div class="title">Para que son estos datos...</div><br>
                    <p> Estos datos se piden para realizar la prueba IMC(índice de masa corporal).El Índice de Masa Corporal es importante para saber si se está en un peso adecuado,
                         lo que evitará ser más propenso a padecer enfermedades crónicas degenerativas como la Diabetes,
                          la presión alta, la ateroesclerosis, los infartos, embolias, etc El IMC es uno de los métodos más empleados.
                    </p>
                    <input type="hidden" id="intensidad" name="intensidad" type="number" class="form-control" value="{{$intensidades}}" >
                <input type="hidden" id="partc" name="partc" type="text" class="form-control" value="{{$partes}}" >
                <input type="hidden" id="sintoma1" name="sintoma1" type="text" class="form-control" value="{{$sintoma1}}" >
                <input type="hidden" id="sintoma2" name="sintoma2" type="text" class="form-control" value="{{$sintoma2}}" >
                <input type="hidden" id="sintoma3" name="sintoma3" type="text" class="form-control" value="{{$sintoma3}}" >
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


@endsection

