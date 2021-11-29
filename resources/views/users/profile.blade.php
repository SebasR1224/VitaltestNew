@extends('layouts.main', ['activePage' =>'profile'])
@section('css')
<!-- Input fecha -->
<link href="{{asset('dashboard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Perfil de usuario</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="/home" class="breadcrumb-item"><i class="text-success anticon anticon-home m-r-5"></i>Inicio</a>
                    <span class="breadcrumb-item active">Mi perfil</span>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="d-md-flex align-items-center">
                                <div class="text-center text-sm-left ">
                                    <div style="width: 140px; height:140px">
                                        <label class="avatar avatar-image" style="width: 140px; height:140px" for="customFile">
                                            <img src="{{Auth::user()->image ? Auth::user()->image : asset('dashboard/images/others/img-4.jpg') }}" alt="">
                                        </label>
                                        <form action="{{route('new.image', Auth::user()->id )}}" id="photoForm" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="customFile">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="text-center text-sm-left m-v-15 p-l-30">
                                    <h2 class="m-b-5">{{$user->username}}</h2>
                                    <p class="text-opacity font-size-13">{{$user->email}}</p>
                                    <p class="text-dark m-b-20">
                                        @forelse ($user->roles as $role)
                                            {{$role->name}}
                                        @empty
                                            Sin rol asignado
                                        @endforelse
                                    </p>
                                    @if ($datos->id)
                                        <button type="button" class="btn btn-success btn-tone" data-toggle="modal" data-target=".editProfile{{ Auth::user()->id}}">Editar perfil</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="d-md-block d-none border-left col-1"></div>
                                <div class="col">
                                    <ul class="list-unstyled m-t-10">
                                        <li class="row">
                                            <p class="col-sm-5 col-4 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-success anticon anticon-smile"></i>
                                                <span>Nombre: </span>
                                            </p>
                                            <p class="col font-weight-semibold"> {{$datos->nombre ? $datos->nombre : ''}}</p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-5 col-4 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-success anticon anticon-font-colors"></i>
                                                <span>Apellidos: </span>
                                            </p>
                                            <p class="col font-weight-semibold"> {{$datos->apellido1 ? $datos->apellido1 : ''}} {{$datos->apellido2 ? $datos->apellido2 : ''}}</p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-5 col-4 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-success far fa-newspaper"></i>
                                                <span>Documento: </span>
                                            </p>
                                            <p class="col font-weight-semibold"> {{$datos->nombre ? $datos->tipoDocumento : ''}} {{$datos->apellido1 ? $datos->numDocumento : ''}}</p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-5 col-4 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-success anticon anticon-phone"></i>
                                                <span>Teléfono: </span>
                                            </p>
                                            <p class="col font-weight-semibold"> {{$datos->nombre ? $datos->telefono : ''}}</p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-5 col-5 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-success anticon anticon-compass"></i>
                                                <span>Dirección: </span>
                                            </p>
                                            <p class="col font-weight-semibold"> {{$datos->apellido1 ? $datos->direccion : ''}}</p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-5 col-4 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-success far fa-calendar-alt"></i>
                                                <span>Fecha de nacimiento: </span>
                                            </p>
                                            <p class="col font-weight-semibold"> {{$datos->apellido1 ? $datos->fechaNacimiento : ''}}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cambiar contraseña</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('update.password')}}" method="POST" id="validation-password">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label class="font-weight-semibold" for="oldpassword">Contraseña actual:</label>
                                <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Contraseña actual:">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="font-weight-semibold" for="newpassword">Nueva contraseña:</label>
                                <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Nueva contraseña:">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="font-weight-semibold" for="confirmpassword">Confirmar contraseña:</label>
                                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirmar contraseña:">
                                <input type="hidden" name="id" value="{{ Auth::user()->id}}">
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-success m-t-30">Cambiar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5>Bio</h5>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here'.</p>
                            <hr>
                            <h5>Specialilty</h5>
                            <h5 class="m-t-20">
                                <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">Sketch</span>
                                <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">Marvel</span>
                                <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">Photoshop</span>
                                <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">Illustrator</span>
                                <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">Web Design</span>
                                <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">Mobile App Design</span>
                                <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">User Interface</span>
                                <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">User Experience</span>
                            </h5>
                            <hr>
                            <h5>Experices</h5>
                            <div class="m-t-20">
                                <div class="media m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/adobe-thumb.png" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h6 class="m-b-0">UI/UX Designer, Adobe Inc.</h6>
                                        <span class="font-size-13 text-gray">Jul 2018</span>
                                    </div>
                                </div>
                                <div class="media m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/amazon-thumb.png" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h6 class="m-b-0">Product Developer, Amazon.com Inc.</h6>
                                        <span class="font-size-13 text-gray">Jul-2017 - Jul 2018</span>
                                    </div>
                                </div>
                                <div class="media m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/nvidia-thumb.png" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h6 class="m-b-0">Interface Designer, Nvidia Corporation</h6>
                                        <span class="font-size-13 text-gray">Jul-2016 - Jul 2017</span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h5>Education</h5>
                            <div class="m-t-20">
                                <div class="media m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/cambridge-thumb.png" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h6 class="m-b-0">MSt in Social Innovation, Cambridge University</h6>
                                        <span class="font-size-13 text-gray">Jul-2012 - Jul 2016</span>
                                    </div>
                                </div>
                                <div class="media m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/phillips-academy-thumb.png" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h6 class="m-b-0">Phillips Academy</h6>
                                        <span class="font-size-13 text-gray">Jul-2005 - Jul 2011</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5>Reviews (18)</h5>
                            <div class="m-t-20">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-h-0">
                                        <div class="media m-b-15">
                                            <div class="avatar avatar-image">
                                                <img src="assets/images/avatars/thumb-8.jpg" alt="">
                                            </div>
                                            <div class="media-body m-l-20">
                                                <h6 class="m-b-0">
                                                    <a href="" class="text-dark">Lillian Stone</a>
                                                </h6>
                                                <span class="font-size-13 text-gray">28th Jul 2018</span>
                                            </div>
                                        </div>
                                        <span>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</span>
                                        <div class="star-rating m-t-15">
                                            <input type="radio" id="star1-5" name="rating-1" value="5" checked disabled/><label for="star1-5" title="5 star"></label>
                                            <input type="radio" id="star1-4" name="rating-1" value="4" disabled/><label for="star1-4" title="4 star"></label>
                                            <input type="radio" id="star1-3" name="rating-1" value="3" disabled/><label for="star1-3" title="3 star"></label>
                                            <input type="radio" id="star1-2" name="rating-1" value="2" disabled/><label for="star1-2" title="2 star"></label>
                                            <input type="radio" id="star1-1" name="rating-1" value="1" disabled/><label for="star1-1" title="1 star"></label>
                                        </div>
                                    </li>
                                    <li class="list-group-item p-h-0">
                                        <div class="media m-b-15">
                                            <div class="avatar avatar-image">
                                                <img src="assets/images/avatars/thumb-9.jpg" alt="">
                                            </div>
                                            <div class="media-body m-l-20">
                                                <h6 class="m-b-0">
                                                    <a href="" class="text-dark">Victor Terry</a>
                                                </h6>
                                                <span class="font-size-13 text-gray">28th Jul 2018</span>
                                            </div>
                                        </div>
                                        <span>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</span>
                                        <div class="star-rating m-t-15">
                                            <input type="radio" id="star2-5" name="rating-2" value="5" disabled/><label for="star2-5" title="5 star"></label>
                                            <input type="radio" id="star2-4" name="rating-2" value="4" checked disabled/><label for="star2-4" title="4 star"></label>
                                            <input type="radio" id="star2-3" name="rating-2" value="3" disabled/><label for="star2-3" title="3 star"></label>
                                            <input type="radio" id="star2-2" name="rating-2" value="2" disabled/><label for="star2-2" title="2 star"></label>
                                            <input type="radio" id="star2-1" name="rating-2" value="1" disabled/><label for="star2-1" title="1 star"></label>
                                        </div>
                                    </li>
                                    <li class="list-group-item p-h-0">
                                        <div class="media m-b-15">
                                            <div class="avatar avatar-image">
                                                <img src="assets/images/avatars/thumb-10.jpg" alt="">
                                            </div>
                                            <div class="media-body m-l-20">
                                                <h6 class="m-b-0">
                                                    <a href="" class="text-dark">Wilma Young</a>
                                                </h6>
                                                <span class="font-size-13 text-gray">28th Jul 2018</span>
                                            </div>
                                        </div>
                                        <span>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</span>
                                        <div class="star-rating m-t-15">
                                            <input type="radio" id="star3-5" name="rating-3" value="5" checked disabled/><label for="star3-5" title="5 star"></label>
                                            <input type="radio" id="star3-4" name="rating-3" value="4" disabled/><label for="star3-4" title="4 star"></label>
                                            <input type="radio" id="star3-3" name="rating-3" value="3" disabled/><label for="star3-3" title="3 star"></label>
                                            <input type="radio" id="star3-2" name="rating-3" value="2" disabled/><label for="star3-2" title="2 star"></label>
                                            <input type="radio" id="star3-1" name="rating-3" value="1" disabled/><label for="star3-1" title="1 star"></label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Connected</h5>
                            <div class="m-t-30">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                    </div>
                                    <div class="m-l-10">
                                        <h5 class="m-b-0">
                                            <a href="" class="text-dark">Erin Gonzales</a>
                                        </h5>
                                        <span class="font-size-13 text-gray">UI/UX Designer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-30">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                    </div>
                                    <div class="m-l-10">
                                        <h5 class="m-b-0">
                                            <a href="" class="text-dark">Darryl Day</a>
                                        </h5>
                                        <span class="font-size-13 text-gray">Software Engineer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-30">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                    </div>
                                    <div class="m-l-10">
                                        <h5 class="m-b-0">
                                            <a href="" class="text-dark">Marshall Nichols</a>
                                        </h5>
                                        <span class="font-size-13 text-gray">Product Manager</span>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-30">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-6.jpg" alt="">
                                    </div>
                                    <div class="m-l-10">
                                        <h5 class="m-b-0">
                                            <a href="" class="text-dark">Riley Newman</a>
                                        </h5>
                                        <span class="font-size-13 text-gray">Data Analyst</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5>Projects</h5>
                            <div class="m-t-20">
                                <div class="m-b-20 p-b-20 border-bottom">
                                    <div class="media align-items-center m-b-15">
                                        <div class="avatar avatar-image">
                                            <img src="assets/images/others/coffee-app-thumb.jpg" alt="">
                                        </div>
                                        <div class="media-body m-l-20">
                                            <h5 class="m-b-0">
                                                <a href="" class="text-dark">Coffee Finder App</a>
                                            </h5>
                                        </div>
                                    </div>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                    <div class="d-inline-block">
                                        <a class="m-r-5" data-toggle="tooltip" title="Eugene Jordan" href="">
                                            <div class="avatar avatar-image avatar-sm">
                                                <img src="assets/images/avatars/thumb-6.jpg" alt="">
                                            </div>
                                        </a>
                                        <a class="m-r-5" data-toggle="tooltip" title="Pamela" href="">
                                            <div class="avatar avatar-image avatar-sm">
                                                <img src="assets/images/avatars/thumb-7.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="float-right">
                                        <span class="badge badge-pill badge-blue font-size-12 p-h-10">In Progress</span>
                                    </div>
                                </div>
                                <div class="m-b-20 p-b-20 border-bottom">
                                    <div class="media align-items-center m-b-15">
                                        <div class="avatar avatar-image">
                                            <img src="assets/images/others/weather-app-thumb.jpg" alt="">
                                        </div>
                                        <div class="media-body m-l-20">
                                            <h5 class="m-b-0">
                                                <a href="" class="text-dark">Weather App</a>
                                            </h5>
                                        </div>
                                    </div>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                    <div class="d-inline-block">
                                        <a class="m-r-5" data-toggle="tooltip" title="Lillian Stone" href="">
                                            <div class="avatar avatar-image avatar-sm">
                                                <img src="assets/images/avatars/thumb-8.jpg" alt="">
                                            </div>
                                        </a>
                                        <a class="m-r-5" data-toggle="tooltip" title="Victor Terry" href="">
                                            <div class="avatar avatar-image avatar-sm">
                                                <img src="assets/images/avatars/thumb-9.jpg" alt="">
                                            </div>
                                        </a>
                                        <a class="m-r-5" data-toggle="tooltip" title="Wilma Young" href="">
                                            <div class="avatar avatar-image avatar-sm">
                                                <img src="assets/images/avatars/thumb-10.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="float-right">
                                        <span class="badge badge-pill badge-cyan font-size-12 p-h-10">Completed</span>
                                    </div>
                                </div>
                                <div class="m-b-20 p-b-20 border-bottom">
                                    <div class="media align-items-center m-b-15">
                                        <div class="avatar avatar-image">
                                            <img src="assets/images/others/music-app-thumb.jpg" alt="">
                                        </div>
                                        <div class="media-body m-l-20">
                                            <h5 class="m-b-0">
                                                <a href="" class="text-dark">Music App</a>
                                            </h5>
                                        </div>
                                    </div>
                                    <p>Protein, iron, and calcium are some of the nutritional benefits associated with cheeseburgers.</p>
                                    <div class="d-inline-block">
                                        <a class="m-r-5" data-toggle="tooltip" title="Darryl Day" href="">
                                            <div class="avatar avatar-image avatar-sm">
                                                <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                            </div>
                                        </a>
                                        <a class="m-r-5" data-toggle="tooltip" title="Virgil Gonzales" href="">
                                            <div class="avatar avatar-image avatar-sm">
                                                <img src="assets/images/avatars/thumb-4.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="float-right">
                                        <span class="badge badge-pill badge-cyan font-size-12 p-h-10">Completed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal completar --}}
<div class="modal fade completarPerfil{{ Auth::user()->id}}" aria-labelledby="..." aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-block ">
                <p class="modal-title h3  text-primary">Completar mi perfil</p>
                <p class="h5 font-weight-light">Para continuar complete los siguientes datos</p>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="tab-content m-t-15">
                        <div class="tab-pane fade show active" id="tab-account" >
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('profile.create')}}" method="post" id="validation-complete">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label class="font-weight-semibold" for="nombre">Nombre:</label>
                                                <input type="text" class="form-control" id="nombre" placeholder="Nombre completo" name="nombre" value="{{ @old('nombre', $datos->nombre)}}">
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                                                 @error('nombre')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="font-weight-semibold" for="apellido1">Primer apellido:</label>
                                                <input type="text" class="form-control" id="apellido1" placeholder="Primer apellido" name="apellido1" value="{{ @old('apellido1', $datos->apellido1)}}">
                                                @error('apellido1')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="font-weight-semibold" for="apellido2">Segundo apellido</label>
                                                <input type="text" class="form-control" id="apellido2" placeholder="Segundo apellido" name="apellido2" value="{{ @old('apellido2', $datos->apellido2)}}">
                                                @error('apellido2')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label class="font-weight-semibold" for="tipoDocumento">Tipo de documento:</label>
                                                <select name="tipoDocumento" id="tipoDocumento" class="form-control">
                                                    <option value="" selected>Tipo de documento</option>
                                                    <option value="TI">Tarjeta de identidad</option>
                                                    <option value="CC">Cedula de ciudadania</option>
                                                    <option value="PS">Pasaporte</option>
                                                </select>
                                                @error('tipoDocumento')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="font-weight-semibold" for="numDocumento">Número de documento:</label>
                                                <input type="number" class="form-control" id="numDocumento" placeholder="Número de documento" name="numDocumento" value="{{ @old('numDocumento', $datos->numDocumento)}}">
                                                <span id="error" class="error text-danger"></span>
                                                @error('numDocumento')<span class="text-danger" id="errorLaravelDocument">{{$message}}</span>@enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="font-weight-semibold" for="confirmNumDocumento">Confirmar número de documento:</label>
                                                <input type="number" class="form-control" id="confirmNumDocumento" placeholder="Número de documento" name="confirmNumDocumento" value="{{ @old('numDocumento', $datos->numDocumento)}}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label class="font-weight-semibold" for="telefono">Teléfono:</label>
                                                <input type="number" class="form-control" id="telefono" placeholder="Número de telefono" name="telefono" value="{{ @old('telefono', $datos->telefono)}}" >
                                                @error('telefono')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="font-weight-semibold" for="direccion">Dirección:</label>
                                                <input type="text" class="form-control" id="direccion" placeholder="Ej: Calle 103 # 42B BIS - 45" name="direccion"  value="{{ @old('direccion', $datos->direccion)}}" >
                                                @error('direccion')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="font-weight-semibold" for="fechaNacimiento">Fecha de nacimiento:</label>
                                                <input type="text" id="fechaNacimiento" class="form-control datepicker-input" placeholder=" mes/día/año" name="fechaNacimiento"  value="{{ @old('fechaNacimiento', $datos->fechaNacimiento)}}" >
                                                @error('fechaNacimiento')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <button type="submit" id="btnEnviar" class="btn btn-primary m-t-30 float-right">Completar perfil</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal editar --}}
<div class="modal fade editProfile{{ Auth::user()->id}}">
    <div class="modal-dialog modal-xl modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title h3  text-success">Actualizar mi perfil</p>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="tab-content m-t-15">
                        <div class="tab-pane fade show active" id="tab-account" >
                            <form action="{{ $datos->id ? route('profile.update', $datos->id) : ''}}" method="post" id="validation-edit">
                                @csrf
                                @method('PUT')
                                <div class="card">
                                    <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="font-weight-semibold" for="Enombre">Nombre:</label>
                                                    <input type="text" class="form-control" id="Enombre" placeholder="Nombre completo" name="nombre" value=" {{ @old('name', $datos->nombre)}}">
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="font-weight-semibold" for="Eapellido1">Primer apellido:</label>
                                                    <input type="text" class="form-control" id="Eapellido1" placeholder="Primer apellido" name="apellido1" value="{{ @old('apellido1', $datos->apellido1)}}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="font-weight-semibold" for="Eapellido2">Segundo apellido</label>
                                                    <input type="text" class="form-control" id="Eapellido2" placeholder="Segundo apellido" name="apellido2" value="{{ @old('apellido2', $datos->apellido2)}}">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="font-weight-semibold" for="EtipoDocumento">Tipo de documento:</label>
                                                    <select name="tipoDocumento" id="EtipoDocumento" class="form-control">
                                                        <option value="">Tipo de documento</option>
                                                        <option value="TI" {{$datos->tipoDocumento == 'TI' ? 'selected' : ''}}>Tarjeta de identidad</option>
                                                        <option value="CC" {{$datos->tipoDocumento == 'CC' ? 'selected' : ''}}>Cedula de ciudadania</option>
                                                        <option value="PS" {{$datos->tipoDocumento == 'PS' ? 'selected' : ''}}>Pasaporte</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="font-weight-semibold" for="EnumDocumento">Número de documento:</label>
                                                    <div class="form-control">{{ @old('numDocumento', $datos->numDocumento)}}</div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="font-weight-semibold" for="Etelefono">Teléfono:</label>
                                                    <input type="number" class="form-control" id="Etelefono" placeholder="Número de telefono" name="telefono" value="{{ @old('telefono', $datos->telefono)}}" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="font-weight-semibold" for="Edireccion">Dirección:</label>
                                                    <input type="text" class="form-control" id="Edireccion" placeholder="Ej: Calle 103 # 42B BIS - 45" name="direccion"  value="{{ @old('direccion', $datos->direccion)}}" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="font-weight-semibold" for="EfechaNacimiento">Fecha de nacimiento:</label>
                                                    <input type="text" id="EfechaNacimiento" class="form-control datepicker-input" placeholder=" mes/día/año" name="fechaNacimiento"  value="{{ @old('fechaNacimiento', $datos->fechaNacimiento)}}" >
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label class="font-weight-semibold" for="password">Contraseña:</label>
                                                <div class="input-group">
                                                    <div class="input-group-append">
                                                        <button id="show_password" class="btn" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon text-primary"></span> </button>
                                                    </div>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <button type="submit" class="btn btn-success m-t-30">Actualizar datos</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

<!-- Input fecha -->
<script src="{{asset('dashboard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

{{-- Modal for profile null --}}
@if ($datos->id == null)
    <script>
        $(function(){
  	        $(".completarPerfil{{ Auth::user()->id}}").modal(
                {backdrop: 'static', keyboard: false}
            );
        });
        </script>
@endif
<script>
$("#numDocumento").on("keyup", function(){
    $.ajax({
        url: "{{route('search.document')}}",
        type: "GET",
        data:'numDocumento='+$("#numDocumento").val(),
        dataType: 'JSON',
        success: function(datos){
            $("#error").html(datos.message)
            $("#numDocumento").addClass(datos.class)
        }
    });
});
</script>
<script src="{{asset('dashboard/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/validation/ProfileValidation.js')}}"></script>

@endsection

