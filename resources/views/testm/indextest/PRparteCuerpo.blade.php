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
                        <div class="containerin">
                            <div class="contenedorB">
                                <center>
                                <div class="progreso-contenedor">

                                    <div class="progreso" id="progreso"></div>
                                    <div class="circulo active">1</div>
                                    <div class="circulo">2</div>
                                    <div class="circulo">3</div>
                                    <div class="circulo">4</div>
                                    <div class="circulo">R</div>

                                </div>
                            </center>
                            </div>
                            <div class="title">Parte del cuerpo</div>
                            <form action="{{ route('testm') }}" class="formularioss" method="POST">
                                @csrf
                                <br>
                                <h1 class="title">Seleccione la parte del cuerpo en la que presenta dolor:</h1>
                                <div class="checkboxx">
                                    <center>
                                        <h3>Tren Superior</h3>
                                        <br>

                                        <table>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>

                                            <tbody>
                                                <tr><td>
                                                    <div id="product1"><input  type="checkbox" name="partc" id="checkbox1" value="Cabeza" >
                                                    <label for="checkbox1">Cabeza </label></div></td>
                                                    <td><div id="product1"><input type="checkbox" name="partc" id="checkbox2" value="Cuello" >
                                                    <label for="checkbox2">Cuello </label></div></td>
                                                    <td><div id="product1"><input type="checkbox" name="partc" id="checkbox3" value="Hombro">
                                                    <label for="checkbox3">Hombro </label></div></td>
                                                    <td><div id="product1"><input type="checkbox" name="partc" id="checkbox4" value="Espalda">
                                                        <label for="checkbox4">Espalda</label></div></td>
                                                    </tr>
                                                        <tr><td><br></td></tr>

                                                <tr><td><div id="product1"><input type="checkbox"  name="partc" id="checkbox5" value="Pecho">
                                                    <label for="checkbox5">Pecho </label></div></td>
                                                    <td><div id="product1"><input type="checkbox" name="partc" id="checkbox6" value="Codo">
                                                        <label for="checkbox6">Codo </label></div></td>
                                                    <td><div id="product1"><input type="checkbox" name="partc" id="checkbox7" value="Barriga">
                                                    <label for="checkbox7">Barriga </label></div></td>
                                                    <td><div id="product1"><input type="checkbox" name="partc" id="checkbox8" value="Abdomen">
                                                        <label for="checkbox8">Brazo </label></div></td></tr>
                                                        <tr><td><br></td></tr>

                                                <tr><td><div id="product1"><input type="checkbox" name="partc" id="checkbox9" value="Muñeca">
                                                    <label for="checkbox9">Muñeca </label></div></td>
                                                <td><div id="product1"><input type="checkbox" name="partc" id="checkbox10" value="Mano">
                                                    <label for="checkbox10">Mano</label></div></td>
                                                <td><div id="product1"><input type="checkbox" name="partc" id="checkbox11" value="Dedo">
                                                    <label for="checkbox11">Dedo </label></div></td></tr>


                                            </tbody>
                                        </div>
                                        </table>

                                    </center>
                                </div>
                                <div class="checkboxx">
                                    <center>
                                        <h3>Tren Inferior</h3>
                                        <br>
                                        <table>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <tbody>
                                                <tr><td><div id="product1"><input type="checkbox" name="partc" id="checkbox12" value="Cintura">
                                                    <label for="checkbox12">Cintura </label></div></td>
                                                    <td><div id="product1"><input type="checkbox" name="partc" id="checkbox13" value="Muslo">
                                                        <label for="checkbox13">Muslo </label></div></td>
                                                    <td><div id="product1"><input type="checkbox" name="partc" id="checkbox14" value="Rodilla">
                                                    <label for="checkbox14">Rodilla </label></div></td>
                                                    <td><div id="product1"><input type="checkbox" name="partc" id="checkbox15" value="Pantorrilla">
                                                        <label for="checkbox15">Pantorrilla </label></div></td></tr>
                                                        <tr><td><br></td></tr>
                                                <tr><td><div id="product1"><input type="checkbox" name="partc" id="checkbox16" value="Tobillo">
                                                    <label for="checkbox16">Tobillo </label></div></td>
                                                    <td><div id="product1"><input type="checkbox" name="partc" id="checkbox17" value="Pie">
                                                        <label for="checkbox17">Pie </label></div></td>
                                                    <td><div id="product1"><input type="checkbox" name="partc" id="checkbox18" value="Talon">
                                                    <label for="checkbox18">Talón </label></div></td>
                                                    <td><div id="product1"><input type="checkbox" name="partc" id="checkbox19" value="Uña">
                                                    <label for="checkbox19">Uña </label></div></td></tr>
                                            </tbody>
                                        </table>
                                    </center>
                                </div>


                                <center>
                                    <a href="/tests" button class="button button2" tabindex="5">Reintentar</a>
                            <button type="submit"  button class="button button2" tabindex="4">Siguiente</button>
                        </center>
                            </form>
                    </div>

                        <div class="containerin">

                            <h1 class="title">Referencia de cuerpo</h1>


                                    <img src="{{asset('test/img/cuerpo.jpeg')}}" >

                        </div>


            </div>
        </div>


    </div>
</div>

@endsection

@section('js')
<script src="{{asset('test/js/jquery.js')}}"></script>
@endsection
