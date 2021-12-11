<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <!-- icons -->
    <script src="https://kit.fontawesome.com/18d9640215.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{secure_asset('login-assets/css/owl.carousel.min.css')}}">

    <link rel="shortcut icon" href="{{secure_asset('dashboard/images/logo/favicon.png')}}">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{secure_asset('login-assets/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{secure_asset('login-assets/css/style.css')}}">

    <title>Recuperar Contraseña</title>
  </head>

  <body style="background-image: url({{secure_asset('login-assets/img/recuperarcontraseña.jpg')}});">
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
                  <div class="">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3 class="text-center mb-5"><img src="{{secure_asset('login-assets/img/logo.png')}}" alt=""></h3>
                    <h3 class="mt-4 font-weight-light">Recuperar Contraseña</h3>
                  <p class="mb-4">Digite su correo electrónico para enviar un enlace que le permitirá reestablecer su contraseña.</p>

                </div>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                  <div class="form-group first">
                    <label for="email">Correo</label>
                    <input type="text" class="form-control" id="email" name="email"  value="{{ old('email', null) }}" required autocomplete="email" autofocus>
                    @if ($errors->has('email'))
                    <div id="email-error" for="email" style="display: block;">
                        <p class="text-danger p-2">{{ $errors->first('email') }}</p>
                    </div>
                    @endif
                </div>
                <div class="d-flex justify-content-between mb-5 ">
                    <div class="mt-4">
                        <a href="{{ route('login') }}" class="">Volver a inicio de sesión</a>
                      </div>
                  </div>
                  <input type="submit" value="Enviar enlace" class="btn btn-pill text-white btn-block btn-vital">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script src="{{secure_asset('login-assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{secure_asset('login-assets/js/popper.min.js')}}"></script>
    <script src="{{secure_asset('login-assets/js/bootstrap.min.js')}}"></script>
    <script src="{{secure_asset('login-assets/js/main.js')}}"></script>
  </body>
</html>
