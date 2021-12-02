<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$tittle}}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('dashboard/images/logo/favicon.png')}}">
    <!-- CSS Files -->
    @livewireStyles
    @livewireScripts
    @yield('css')

    <link href="{{asset('dashboard/css/app.min.css')}}" rel="stylesheet">

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
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
      @yield('js')

    <!-- Core JS -->
      <script src="{{asset('dashboard/js/app.min.js')}}"></script>
    <!-- Sweet alert -->
    @include('sweetalert::alert')

</body>
</html>
