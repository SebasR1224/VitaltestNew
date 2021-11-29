 <!-- Side Nav START -->
 <div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown {{ $activePage == 'dashboard' ? ' active' : '' }}" >
                <a class="dropdown" href="{{ route('home') }}">
                    <span class="icon-holder">
                        <i class="text-success anticon anticon-home"></i>
                    </span>
                    <span class="title">Inicio</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="text-success anticon anticon-usergroup-add"></i>
                    </span>
                    <span class="title">Usuarios</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ $activePage == 'users' ? ' active' : '' }}">
                        <a href="{{route('users.index')}}">Lista de Usuarios</a>
                    </li>
                    <li class="{{ $activePage == 'userCreate' ? ' active' : '' }}">
                        <a href="{{route('users.create')}}">Agregar Usuario</a>
                    </li>
                    @if ($activePage == 'editUsers')
                    <li class="{{$activePage == 'editUsers' ? 'active' : ''}}">
                        <a href="">Editar Usuario</a>
                    </li>
                    @endif
                    @if ($activePage == 'usersShow')
                    <li class="{{$activePage == 'usersShow' ? 'active' : ''}}">
                        <a href="">Detalles Usuario</a>
                    </li>
                    @endif
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="text-success anticon anticon-medicine-box"></i>
                    </span>
                    <span class="title">Inventario</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{$activePage == 'inventory' ? 'active' : ''}}">
                        <a href="{{route('medicines.index')}}">Lista de Inventario</a>
                    </li>
                    <li class="{{$activePage == 'newProduct' ? 'active' : ''}}">
                        <a href="{{route('medicines.create')}}">Agregar Producto</a>
                    </li>
                    @if ($activePage == 'editMedicines')
                    <li class="{{$activePage == 'editMedicines' ? 'active' : ''}}">
                        <a href="">Editar Producto</a>
                    </li>
                    @endif
                    @if ($activePage == 'showMedicines')
                    <li class="{{$activePage == 'showMedicines' ? 'active' : ''}}">
                        <a href="">Detalles del Producto</a>
                    </li>
                    @endif
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="text-success anticon anticon-file-protect"></i>
                    </span>
                    <span class="title">Recomendaciones</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{$activePage == 'recommendation' ? 'active' : ''}}">
                        <a href="{{route('recomendacion.index')}}">Lista de Recomendaciones</a>
                    </li>
                    <li class="{{$activePage == 'createRecommendation' ? 'active' : ''}}">
                        <a href="{{route('recomendacion.create')}}">Agregar Recomendación</a>
                    </li>
                    @if ($activePage == 'editRecommendation')
                    <li class="{{$activePage == 'editRecommendation' ? 'active' : ''}}">
                        <a href="">Editar Recomendación</a>
                    </li>
                    @endif
                    @if ($activePage == 'showRecommendation')
                    <li class="{{$activePage == 'showRecommendation' ? 'active' : ''}}">
                        <a href="">Detalles Recomendación</a>
                    </li>
                    @endif

                </ul>
            </li>
            <li class="nav-item dropdown {{ $activePage == 'commerce' ? ' active' : '' }}" >
                <a class="dropdown" href="{{ route('medicines.commerce') }}">
                    <span class="icon-holder">
                        <i class="text-success anticon anticon-shop"></i>
                    </span>
                    <span class="title">Tienda</span>
                </a>
            </li>
            <li class="nav-item dropdown {{ $activePage == 'chat' ? ' active' : '' }}" >
                <a class="dropdown" href="{{ route('chat.index') }}">
                    <span class="icon-holder">
                        <i class="text-success anticon anticon-message"></i>
                    </span>
                    <span class="title">Chat</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Side Nav END -->
<div class="modal modal-right fade quick-view" id="quick-view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-between align-items-center">
                <h5 class="modal-title">Theme Config</h5>
            </div>
            <div class="modal-body scrollable">
                <div class="m-b-30">
                    <h5 class="m-b-0">Header Color</h5>
                    <p>Config header background color</p>
                    <div class="theme-configurator d-flex m-t-10">
                        <div class="radio">
                            <input id="header-default" name="header-theme" type="radio" checked value="default">
                            <label for="header-default"></label>
                        </div>
                        <div class="radio">
                            <input id="header-primary" name="header-theme" type="radio" value="primary">
                            <label for="header-primary"></label>
                        </div>
                        <div class="radio">
                            <input id="header-success" name="header-theme" type="radio" value="success">
                            <label for="header-success"></label>
                        </div>
                        <div class="radio">
                            <input id="header-secondary" name="header-theme" type="radio" value="secondary">
                            <label for="header-secondary"></label>
                        </div>
                        <div class="radio">
                            <input id="header-danger" name="header-theme" type="radio" value="danger">
                            <label for="header-danger"></label>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <h5 class="m-b-0">Side Nav Dark</h5>
                    <p>Change Side Nav to dark</p>
                    <div class="switch d-inline">
                        <input type="checkbox" name="side-nav-theme-toogle" id="side-nav-theme-toogle">
                        <label for="side-nav-theme-toogle"></label>
                    </div>
                </div>
                <hr>
                <div>
                    <h5 class="m-b-0">Folded Menu</h5>
                    <p>Toggle Folded Menu</p>
                    <div class="switch d-inline">
                        <input type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                        <label for="side-nav-fold-toogle"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
