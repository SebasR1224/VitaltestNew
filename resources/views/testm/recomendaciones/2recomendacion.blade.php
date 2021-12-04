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
            @csrf

			<div>
				<h4>Recomendacion</h4>
                <br>
				<h2><strong>Recomendacion basada en los datos proporcionados:</strong> </h2>
                @foreach ($enfermedades as $enfermeda )
                @endforeach
                <br><p><strong>Usted posiblemente tenga:</strong>{{$enfermeda->nombreRecomendacion}}</p><br>
				<br><p><strong>Informacion:</strong>{{$enfermeda->informacionAdicional}}</p><br>

                <strong><P>¿Porque presento esto?</P></strong>
                <br><p><strong>Nos basamos en el hecho de que presenta:</strong> {{$enfermeda->nombreSintoma}} en su {{$enfermeda->nombreParte}}.</p><br>
                <p><strong>Tambien por la intensidad de dolor presentada que es de:</strong> {{$intensidad}}</p>
                <br><p><strong>Su Imc que es de:</strong> {{$imc}} el cual es {{$enfermeda->nombreImc}}.</p>
                   <p>ya que se encuentra en el rango de {{$enfermeda->imcMin}} a {{$enfermeda->imcMax}}</p><br>
				<p><strong>Su edad que es de:</strong> {{$edades}} años</p><br>

				<p><strong>Le recomendamos usar los siguientes medicamentos de la siguiente forma:</strong></p>
                <br><p>La cantidad de dosis que debera usar es de:{{$enfermeda->dosis}}</p>
                <p>Con una frecuencia de :{{$enfermeda->frecuencia}}</p>
                <p>En un lapso de tiempo de :{{$enfermeda->tiempo}}</p><br>


		    </div>

		</div>

	</div>

</div>
<div class="container3">
    <div class="card3">
        <div class="left-column background3-left-column">
            <h6></h6>
            <h2>Productos</h2>
            <br>
        </div>
            <div class="scroll-div">
                <div class="containeri">
                @foreach ($medicines as $medicine)
                @csrf
                    <div class="cardi">
                        <img src="{{$medicine->imagen}}">
                    <p>{{$medicine->nombreMedicamento}}</p>
                    <a href="{{route('commerce-show', $medicine->id)}}">Leer más</a>
                  </div>
                  @endforeach

                </div>
            </div>
    </div>
</div>
<div class="container2">
	<div class="card3">
		<div class="left-column background2-left-column">
			<br>
			<h2>Respuestas</h2>
			<br>
		</div>

		<div class="right-column">
			<div>
				<br><h1>Las respuestas dadas por usted en el test son:</h1><br>
                <br><p><strong>En que parte del cuerpo presenta dolor:</strong>{{$enfermeda->nombreParte}}</p>
                <br><p><strong>Cuantos sintomas presenta:</strong>{{$nsintoma}}</p>
                <br><p><strong>Que sitoma presenta:</strong>{{$enfermeda->nombreSintoma}}</p>
                <br><p><strong>Cual es la intensidad de dolor que presenta:</strong>{{$intensidad}}</p>
                <br><p><strong>Que edad tiene:</strong>{{$edades}}</p>
                <br><p><strong>Cual es su estatura:</strong>{{$estatura}} </p>
                <br><p><strong>Cual es su peso:</strong>{{$peso}}</p><br><br><br>
                <a href="/tests" button class="button button2 tabindex="5">Reintentar</a>
                <button type="submit"  button class="button button2" tabindex="4">Guardar</button>
                <br><br><br><br><br><br>
               <div><h4>Esta informacion sepidio con fin de poder obtener una recomendacion para lo que tiene.
                No se empleara esta informacion  con otro fin.</h4> </div>

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

			<form action="" class="form_contact">
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
