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
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                       <div class="d-block">
                            <h1 class="h6">Bienvenido a</h1>
                                <img class="img-fluid"src="{{secure_asset('dashboard/images/logo/logo.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
