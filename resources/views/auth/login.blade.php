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

    <title>Iniciar sesión</title>
  </head>
  <body>
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
                  <div class="">
                    @if (session('error'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{ session('error')}}.
                        </div>
                    @endif
                    <h3 class="text-center mb-0"><img src="{{secure_asset('login-assets/img/logo.png')}}" alt=""></h3>
                    <h3 class="mt-4 font-weight-light">Iniciar sesión</h3>
                  <p class="mb-4">Le damos la bienvenida, esperamos disfrute de nuestros beneficios.</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="form-group first">
                    <label for="username">Nombre de usuario o correo</label>
                    <input type="text" class="form-control" id="username" name="username"  value="{{ old('username', null) }}" required autocomplete="username" autofocus>
                    @if ($errors->has('username'))
                    <div id="email-error" for="username" style="display: block;">
                        <p class="text-danger p-2">{{ $errors->first('username') }}</p>
                    </div>
                    @endif
                </div>
                  <div class="form-group last mb-4">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" class="form-control"  required autocomplete="current-password">
                    @if ($errors->has('password'))
                    <div id="password-error" for="password" style="display: block;">
                        <p class="text-danger p-2">{{ $errors->first('password') }}</p>
                    </div>
                    @endif
                </div>
                  <input type="submit" value="Iniciar sesión" class="btn btn-pill text-white btn-block btn-vital">

                  <div class="d-flex justify-content-between ">
                    <div class="mt-4">
                        <a href="{{ route('password.request') }}" class="">¿Olvidó su contraseña?</a>
                      </div>
                      <div class="mt-4">
                        <a href="{{ route('register') }}" class="">Crear cuenta</a>
                      </div>
                  </div>


                  <span class="d-block text-center my-2 text-muted"> o inicia sesión con</span>


                  <div class="social-login text-center">
                    <a href="#" class="facebook">
                      <span class="fab fa-facebook-f"></span>
                    </a>
                    <a href="#" class="google">
                      <span class="fab fa-google"></span>
                    </a>
                  </div>
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

