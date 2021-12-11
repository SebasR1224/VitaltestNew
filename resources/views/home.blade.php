@extends('layouts.main' , ['activePage' => 'dashboard'], ['tittle' => 'Inicio'])

@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Inicio</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">

                </nav>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card ">
                <div class="card-body">
                    <div class="d-block text-center">
                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{asset('dashboard/images/others/home1.svg')}}" class="d-block w-100" height="600px" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h1 class="text-success">Bienvenido</h1>
                                        <img src="{{asset('dashboard/images/logo/logoG.png')}}"   alt="">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('dashboard/images/others/home4.svg')}}"   class="d-block w-100 " height="600px" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h1 class="text-success">Bienvenido</h1>
                                        <img src="{{asset('dashboard/images/logo/logoG.png')}}"   alt="">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('dashboard/images/others/home5.svg')}}" class="d-block w-100 " height="600px" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h1 class="text-success">Bienvenido</h1>
                                        <img src="{{asset('dashboard/images/logo/logoG.png')}}"    alt="">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('dashboard/images/others/home2.svg')}}" class="d-block w-100 " height="600px" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h1 class="text-success">Bienvenido</h1>
                                        <img src="{{asset('dashboard/images/logo/logoG.png')}}"    alt="">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('dashboard/images/others/home3.svg')}}" class="d-block w-100 " height="600px" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h1 class="text-success">Bienvenido</h1>
                                        <img src="{{asset('dashboard/images/logo/logoG.png')}}"    alt="">
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev  " href="#carouselExampleCaptions" data-slide="prev">
                                <span class="carousel-control-prev-icon "></span>
                                <span class="sr-only ">Previo</span>
                            </a>
                            <a class="carousel-control-next " href="#carouselExampleCaptions" data-slide="next">
                                <span class="carousel-control-next-icon "></span>
                                <span class="sr-only ">Siguiente</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
