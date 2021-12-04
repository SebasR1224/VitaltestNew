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
  <script>
    $(document).ready(function() {
        $('input[type=checkbox]').live('click', function(){
            var parent = $(this).parent().attr('id');
            $('#'+parent+' input[type=checkbox]').removeAttr('checked');
            $(this).attr('checked', 'checked');
        });
    });
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
                        <div class="circulo">3</div>
                        <div class="circulo">4</div>
                        <div class="circulo">R</div>

                    </div>
                </center>
                </div>
                <div class="checkboxx">
                    <div class="title">Cuantos sintomas presenta...</div><br>
                        <p>¿Que es un sintoma?<p>
                        <p> Un sintoma es un problema físico o mental que presenta una persona, el cual puede indicar una
                            enfermedad o afección.Los síntomas no se pueden observar y no se manifiestan en exámenes médicos.
                            Algunos ejemplos de síntomas son el dolor de cabeza, el cansancio crónico, las náuseas y el dolor.</p>
                        <br>
                </div>
                <br>
            <form action="{{ route('testm') }}"  class="formularioss" method="POST">
                @csrf
                <div class="checkboxx">
                    <center>
                        <p>Seleccione la cantidad de sintomas que presenta:</p>
                        <br>
                        <table>
                            <th></th>
                            <th></th>
                            <th></th>
                            <tbody><tr>
                                <td><div id="product1"><input type="checkbox" name="nsintoma" id="checkbox1" value="1">
                                    <label for="checkbox1">1-Sintoma</label></div></td>
                                <td><div id="product1"><input type="checkbox" name="nsintoma" id="checkbox2" value="2">
                                    <label for="checkbox2">2-Sintomas</label></div></td>
                                <td><div id="product1"><input type="checkbox" name="nsintoma" id="checkbox3" value="3">
                                    <label for="checkbox3">3-Sintomas</label></div></td></tr>
                            </tbody>

                        </table>
                <input type="hidden" id="partc" name="partc" type="number" class="form-control" value="{{$partes}}" >
              </center>
                </div>
                <br>
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
</div>
</main>

@endsection

