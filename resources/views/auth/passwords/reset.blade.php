<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <!-- icons -->
    <script src="https://kit.fontawesome.com/18d9640215.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('login-assets/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('login-assets/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('login-assets/css/style.css')}}">

    <title>Recuperar Contraseña</title>
  </head>
  <body style="background-image: url({{asset('login-assets/img/resetContraseña.jpg')}});">
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
                  <div class="">
                    <h3 class="text-center mb-0"><img src="{{asset('login-assets/img/logo.png')}}" alt=""></h3>
                    <h3 class="mt-4 font-weight-light">Reestablecer contraseña</h3>
                  <p class="mb-4">Complete los campos e ingrese una nueva contraseña.</p>
                </div>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->token }}">
                  <div class="form-group first">
                    <label for="email">Correo electrónico</label>
                    <input type="text" class="form-control" id="email" name="email"  value="{{ request()->email ?? old('email') }}" required autocomplete="email" autofocus>
                    @if ($errors->has('email'))
                    <div id="email-error" for="email" style="display: block;">
                        <p class="text-danger p-2">{{ $errors->first('email') }}</p>
                    </div>
                    @endif
                </div>
                <div class="form-group last mb-4">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password"  required autocomplete="new-password">
                    @if ($errors->has('password'))
                    <div id="password-error" for="password" style="display: block;">
                        <p class="text-danger p-2">{{ $errors->first('password') }}</p>
                    </div>
                    @endif
                </div>
                  <div class="form-group last mb-4">
                    <label for="password_confirmation">Confirmar contraseña</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" >
                    @if ($errors->has('password_confirmation'))
                    <div id="password_confirmation-error" for="password_confirmation" style="display: block;">
                        <p class="text-danger p-2">{{ $errors->first('password_confirmation') }}</p>
                    </div>
                    @endif
                </div>
                  <input type="submit" value="Reestablecer contraseña" class="btn btn-pill text-white btn-block btn-vital">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script src="{{asset('login-assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('login-assets/js/popper.min.js')}}"></script>
    <script src="{{asset('login-assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('login-assets/js/main.js')}}"></script>
  </body>
</html>

