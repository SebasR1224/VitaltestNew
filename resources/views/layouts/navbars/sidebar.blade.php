 <!-- Side Nav START -->
 <div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown {{ $activePage == 'dashboard' ? ' active' : '' }}" >
                <a class="dropdown" href="{{ route('home') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-home"></i>
                    </span>
                    <span class="title">Inicio</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-usergroup-add"></i>
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
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-medicine-box"></i>
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
                        <i class="anticon anticon-file-done"></i>
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
                    <li class="{{$activePage == 'newProduct' ? 'active' : ''}}">
                        <a href="{{route('medicines.create')}}">Agregar Recomendación</a>
                    </li>
                    @if ($activePage == 'editMedicines')
                    <li class="{{$activePage == 'editMedicines' ? 'active' : ''}}">
                        <a href="">Editar Recomendación</a>
                    </li>
                    @endif
                </ul>
            </li>
            <li class="nav-item dropdown {{ $activePage == 'commerce' ? ' active' : '' }}" >
                <a class="dropdown" href="{{ route('medicines.commerce') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-shop"></i>
                    </span>
                    <span class="title">Tienda</span>
                </a>
            </li>
            <li class="nav-item dropdown {{ $activePage == 'chat' ? ' active' : '' }}" >
                <a class="dropdown" href="{{ route('chat.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-message"></i>
                    </span>
                    <span class="title">Chat</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-hdd"></i>
                    </span>
                    <span class="title">Components</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="accordion.html">Accordion</a>
                    </li>
                    <li>
                        <a href="carousel.html">Carousel</a>
                    </li>
                    <li>
                        <a href="dropdown.html">Dropdown</a>
                    </li>
                    <li>
                        <a href="modals.html">Modals</a>
                    </li>
                    <li>
                        <a href="toasts.html">Toasts</a>
                    </li>
                    <li>
                        <a href="popover.html">Popover</a>
                    </li>
                    <li>
                        <a href="slider-progress.html">Slider & Progress</a>
                    </li>
                    <li>
                        <a href="tabs.html">Tabs</a>
                    </li>
                    <li>
                        <a href="tooltips.html">Tooltips</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-form"></i>
                    </span>
                    <span class="title">Forms</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="form-elements.html">Form Elements</a>
                    </li>
                    <li>
                        <a href="form-layouts.html">Form Layouts</a>
                    </li>
                    <li>
                        <a href="form-validation.html">Form Validation</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-table"></i>
                    </span>
                    <span class="title">Tables</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="basic-table.html">Basic Table</a>
                    </li>
                    <li>
                        <a href="data-table.html">Data Table</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-pie-chart"></i>
                    </span>
                    <span class="title">Charts</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="chartist.html">Chartist</a>
                    </li>
                    <li>
                        <a href="chartjs.html">ChartJs</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-file"></i>
                    </span>
                    <span class="title">Pages</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="profile.html">Profile</a>
                    </li>
                    <li>
                        <a href="invoice.html">Invoice</a>
                    </li>
                    <li>
                        <a href="members.html">Members</a>
                    </li>
                    <li>
                        <a href="pricing.html">Pricing</a>
                    </li>
                    <li>
                        <a href="setting.html">Setting</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span>Blog</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="blog-grid.html">Blog Grid</a>
                            </li>
                            <li>
                                <a href="blog-list.html">Blog List</a>
                            </li>
                            <li>
                                <a href="blog-post.html">Blog Post</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-lock"></i>
                    </span>
                    <span class="title">Authentication</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="login-1.html">Login 1</a>
                    </li>
                    <li>
                        <a href="login-2.html">Login 2</a>
                    </li>
                    <li>
                        <a href="login-3.html">Login 3</a>
                    </li>
                    <li>
                        <a href="sign-up-1.html">Sign Up 1</a>
                    </li>
                    <li>
                        <a href="sign-up-2.html">Sign Up 2</a>
                    </li>
                    <li>
                        <a href="sign-up-3.html">Sign Up 3</a>
                    </li>
                    <li>
                        <a href="error-1.html">Error 1</a>
                    </li>
                    <li>
                        <a href="error-2.html">Error 2</a>
                    </li>
                </ul>
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
