@extends('layouts.main', ['activePage' =>'chat'])
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="container-fluid p-h-0">
            <div class="chat chat-app row">
                <div class="chat-list">
                    <div class="chat-user-tool">
                        <i class="anticon anticon-search search-icon p-r-10 font-size-20"></i>
                        <input placeholder="Search...">
                    </div>
                    <div class="chat-user-list">
                        @foreach ($pharmacists as $pharmacist )
                        <a class="chat-list-item p-h-25" href="javascript:void(0);">
                            <div class="media align-items-center">
                                <div class="avatar avatar-image">
                                    <img src="{{$pharmacist->image}}" alt="">
                                </div>
                                <div class="p-l-15">
                                    <h5 class="m-b-0">{{$pharmacist->username}}</h5>
                                    <p class="m-b-0 text-muted font-size-13 m-b-0">
                                        @if ($pharmacist->isOnline())
                                        <span class="badge badge-success badge-dot m-r-5"></span>
                                        <span>Online</span>
                                        @else
                                        <span class="badge badge-default badge-dot m-r-5"></span>
                                        <span>offline</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @livewire('chat-form')
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{asset('dashboard/js/pages/chat.js')}}"></script>
@endsection
