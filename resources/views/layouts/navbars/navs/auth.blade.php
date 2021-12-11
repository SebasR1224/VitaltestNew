<!-- Header START -->
<div class="header">
    <div class="logo logo-dark">
        <a href="/">
            <img src="{{secure_asset('dashboard/images/logo/logo.png')}}" alt="Logo">
            <img class="logo-fold" src="{{secure_asset('dashboard/images/logo/logo-fold.png')}}" alt="Logo">
        </a>
    </div>
    <div class="logo logo-white">
        <a href="/">
            <img src="{{secure_asset('dashboard/images/logo/logo-fold-white.png')}}" alt="Logo">
            <img class="logo-fold" src="{{secure_asset('dashboard/images/logo/logo-fold-white.png')}}" alt="Logo">
        </a>
    </div>
    <div class="nav-wrap">
        <ul class="nav-left">
            <li class="desktop-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>
            <li class="mobile-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                    <i class="anticon anticon-search"></i>
                </a>
            </li>
        </ul>
        <ul class="nav-right">
            <li class="dropdown dropdown-animated scale-left">
                <a href="javascript:void(0);" data-toggle="dropdown">
                    <i class="anticon anticon-bell notification-badge"></i>
                </a>
                <div class="dropdown-menu pop-notification">
                    <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                        <p class="text-dark font-weight-semibold m-b-0">
                            <i class="anticon anticon-bell"></i>
                            <span class="m-l-10">Notificaciones</span>
                        </p>
                        <a class="btn-sm btn-default btn" href="javascript:void(0);">
                            <small>Ver todas</small>
                        </a>
                    </div>
                    <div class="relative">
                        <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                            <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                <div class="d-flex">
                                    <div class="avatar avatar-blue avatar-icon">
                                        <i class="anticon anticon-mail"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-dark">Has recibido un nuevo mensaje</p>
                                        <p class="m-b-0"><small>8 min atrás</small></p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                <div class="d-flex">
                                    <div class="avatar avatar-cyan avatar-icon">
                                        <i class="anticon anticon-user-add"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-dark">Nuevo usuario registrado</p>
                                        <p class="m-b-0"><small>7 horas atrás</small></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="dropdown dropdown-animated scale-left">
                <div class="pointer" data-toggle="dropdown">
                    <div class="avatar avatar-image  m-h-10 m-r-15">
                    <img src="{{Auth::user()->image ? Auth::user()->image : secure_asset('dashboard/images/others/img-4.jpg') }}" alt="">
                    </div>
                </div>
                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                        <div class="d-flex m-r-50">
                            <div class="avatar avatar-lg avatar-image">
                                <img src="{{Auth::user()->image ? Auth::user()->image : secure_asset('dashboard/images/others/img-4.jpg') }}" alt="">
                            </div>
                            <div class="m-l-10">
                                <p class="m-b-0 text-dark font-weight-semibold">{{Auth::user()->username}}</p>
                                <p class="m-b-0 opacity-07">
                                    @forelse (Auth::user()->roles as $role)
                                        {{$role->name}}
                                    @empty
                                            Sin rol asignado
                                    @endforelse
                                </p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('users.profile', ['id'=>Auth::user()->id])}}" class="dropdown-item d-block p-h-15 p-v-10 nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                                <i class="anticon opacity-04 font-size-16 anticon-user  "></i>
                                <span class="m-l-10">Mi perfil</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="anticon opacity-04 font-size-16 anticon-project"></i>
                                <span class="m-l-10">Reportes</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                    <a href="/" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="anticon opacity-04 font-size-16 anticon-tag"></i>
                                <span class="m-l-10">Página de destino</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                <span class="m-l-10">Salir</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                </div>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                    <i class="anticon anticon-appstore"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Header END -->

<!-- Search Start-->
<div class="modal modal-left fade search" id="search-drawer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-between align-items-center">
                <h5 class="modal-title">Search</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body scrollable">
                <div class="input-affix">
                    <i class="prefix-icon anticon anticon-search"></i>
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <!-- Content goes Here -->
            </div>
        </div>
    </div>
</div>
<!-- Search End-->

<!-- Quick View START -->
<div class="modal modal-right fade quick-view" id="quick-view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-between align-items-center">
                <h5 class="modal-title">Quick View</h5>
            </div>
            <div class="modal-body scrollable">
                <!-- Content goes Here -->
            </div>
        </div>
    </div>
</div>
<!-- Quick View END -->
