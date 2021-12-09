@extends('layouts.main', ['activePage' =>'roles'], ['tittle' => 'Resultados del test'])
@section('content')
<div class="page-container">
    <div class="main-content">
        @foreach ($results as $result)
            <p>{{$result->nombreRecomendacion}}</p>
        @endforeach
    </div>
</div>
@endsection
