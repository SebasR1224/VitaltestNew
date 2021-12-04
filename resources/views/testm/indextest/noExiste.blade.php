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

	<div class="card4">
		<div class="left-column background1-left-column">
			<h6>Salud a tu alcance</h6>
			<h2>VitalTest</h2>
			<img src="assets/img/logo.png"></img>
		</div>

		<div class="right-column">



			<div>
				<H1>Lo sentimos, pero no hay una recomendación para lo que está padeciendo.</H1><br>
                <p>Lo invitamos a que revise sus respuestas, verificando si están correctas, si es así entonces diríjase al establecimiento o a un centro médico.</p><br>

				<br><br><h1>Las respuestas dadas por usted en el test son:</h1>
                <br><p><strong>En que parte del cuerpo presenta dolor:</strong>{{$partes}}</p>
                <br><p><strong>Cuantos sintomas presenta:</strong>{{$nsintoma}}</p>
                <br><p><strong>Que sitoma presenta:</strong>{{$sintoma1}}</p>
                <br><p><strong>Cual es la intensidad de dolor que presenta:</strong>{{$intensidad}}</p>
                <br><p><strong>Que edad tiene:</strong>{{$edades}}</p>
                <br><p><strong>Cual es su estatura:</strong>{{$estatura}} </p>
                <br><p><strong>Cual es su peso:</strong>{{$peso}}</p><br>
                <a href="/tests" button class="button button2 tabindex="5">Reintentar</a>


			</div>

		</div>

	</div>

</div>


<div class="container4">
	<div class="card2">

			<section class="cantact_info">
				<section class="info_title">
					<span class="fa fa-user-circle"></span>
					<h2>INFORMACION<br>DE CONTACTO</h2>
				</section>
				<section class="info_items">
					<p><span class="fa fa-envelope"></span> Sena@gmail.com</p>
					<p><span class="fa fa-mobile"></span> +57 902-8665</p>
				</section>
			</section>

			<form action="enviar.php" class="form_contact">
				<h2>Envia un mensaje</h2>
				<div class="user_info">
					<label for="names">Nombres:</label>
					<input type="text" id="names">

					<label for="phone">Telefono / Celular:</label>
					<input type="text" id="phone">

					<label for="email">Correo electronico:</label>
					<input type="text" id="email">

					<label for="mensaje">Mensaje:</label>
					<textarea id="mensaje"></textarea>

					<input type="button" value="Enviar Mensaje" id="btnSend">
				</div>
			</form>

</div>

</div>
    </div>
@endsection
