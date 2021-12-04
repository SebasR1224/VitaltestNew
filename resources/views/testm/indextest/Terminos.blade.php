@extends('layouts.main', ['activePage' =>'test'], ['tittle' =>'test'])


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
	<div class="card3">
		<div class="left-column background1-left-column">
			<h6>Salud a tu alcance</h6>
			<h2>VitalTest</h2>
			<img src="assets/img/logo.png"></img>
		</div>

		<div class="right-column">
            <div class="containerin">
         <form action="{{ route('testm') }}"  method="POST" id="form" class="form">
             @csrf
			<div>
				<H1>Términos del servicio.</H1><br>
                <p>Antes de utilizar esta herramienta, por favor, lea los términos del servicio. Recuerde que:</p>
                <p><ul><li> El chequeo tiene finalidad informativa y no sustituye la opinión de un médico.</li></ul></p>
                <p><ul><li>Esta herramienta no ofrece asesoramiento médico, únicamente tiene fines informativos.</li></ul></p>
                <p><ul><li>No la use para sustituir el consejo médico profesional, diagnóstico o tratamiento.</li></ul></p>
                <p><ul><li><strong>No usar en caso de emergencias.</strong> En caso de una emergencia de salud, llame a su número de emergencias locales inmediatamente.</li></ul></p>
                <p><ul><li>Si cree que puede tener una emergencia médica, llame inmediatamente a su médico o a emergencias.</li></ul></p>
                <p><ul><li><strong>Sus datos están a salvo.</strong> La información que usted proporcione es anónima y no será compartida con nadie.</li></ul></p>
                <p><ul><li>La confidencialidad de sus datos es importante para nosotros. Cumplimos con las normativas de protección de datos establecidas.</li></ul></p>
                <br>
                <div class="form-radio">
                    <input type="checkbox" name="terminos" id="terminos"><label for="terminos">He leído y acepto los términos y
                        condiciones de este servicio, así como la política de privacidad.</label>
                        <ul class="errors">
                        </ul>
                </div>
                <div class="form-radio">
                    <input type="checkbox" name="terminos2" id="terminos2"><label for="terminos2">
                        Acepto el procesamiento de mi información médica
                        con el propósito de realizar el test.</label>
                        <ul class="errorss">
                        </ul>
                </div>
                 <button type="submit"  button class="button button2" tabindex="4">Empezar</button>

			</div>
             </form>
            </div>
            <script src="{{asset('test/js/script2.js')}}"></script>
		</div>

	</div>

</div>
</div>
</div>


@endsection
