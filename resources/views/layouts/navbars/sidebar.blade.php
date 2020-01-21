<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <!--<img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">-->
            <p class="h1" style="color: #7E7E7E;"><strong>Whodo</strong></p>
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                @if(Auth::user()->hasRole('admin'))
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                            <i class="ni ni-settings-gear-65" style="color: #5e72e4 !important;"></i>
                            <span class="nav-link-text" style="font-weight:bold;">{{ __('Administrador') }}</span>
                        </a>

                        <div class="collapse show" id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('adminpanel') }}">
                                        <i class="ni ni-circle-08" style="color: orange;"></i>
                                        {{ __('Usuarios') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('proveedorindex') }}">
                                        <i class="fa fa-industry" style="color: orange;"></i>
                                        {{ __('Proveedores') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('sugerenciacategoria') }}">
                                        <i class="fa fa-align-justify" style="color: orange;"></i>
                                        {{ __('Sugerencias de categorías') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="#navbar-proveedor" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-proveedor">
                        <i class="ni ni-collection" style="color: #5e72e4 !important;"></i>
                        <span class="nav-link-text" style="font-weight:bold;">{{ __('Proveedor') }}</span>
                    </a>
                    <div class="collapse show" id="navbar-proveedor">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('proveedorcatalogo') }}">
                                    <i class="fa fa-cogs" style="color: orange;"></i>
                                    {{ __('Catálogos') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#navbar-cliente" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-cliente">
                        <i class="ni ni-collection" style="color: #5e72e4 !important;"></i>
                        <span class="nav-link-text" style="font-weight:bold;">{{ __('Cliente') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-cliente">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('clientecatalogo') }}">
                                    <i class="fa fa-sticky-note" style="color: orange;"></i>
                                    {{ __('Catálogos') }}
                                </a>
                            </li>
                        </ul>
                    </div>

                </li>
                
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
        </div>
    </div>
</nav>
