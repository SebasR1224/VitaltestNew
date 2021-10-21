<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png">
    <!-- CSS Files -->
    <link href="{{asset('dashboard/css/app.min.css')}}" rel="stylesheet">
     @yield('css')
</head>
<body>
    @auth()
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <div class="app">
        <div class="layout">
            @include('layouts.page_templates.auth')
        </div>
    </div>
    @endauth

    <!-- Core Vendors JS -->
      <script src="{{asset('dashboard/js/vendors.min.js')}}"></script>
    <!-- Core JS -->
      <script src="{{asset('dashboard/js/app.min.js')}}"></script>
    <!-- Sweet alert -->
    @include('sweetalert::alert')
    @yield('js')
</body>
</html>
