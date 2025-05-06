<header id="navbar">
    <div id="navbar-container" class="boxed">
        <!-- Brand logo & name -->
        <div class="navbar-header">
            <a href="{{ route('arbitro.dashboard') }}" class="navbar-brand">
                <img src="{{ asset('image/logo-prueba.png') }}" alt="Nifty Logo" class="brand-icon">
                <div class="brand-title">
                    <span class="brand-text">ASO Karate</span>
                </div>
            </a>
        </div>

        <div class="navbar-content">
            <ul class="nav navbar-top-links">
                <!-- Navigation toggle button -->
                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle" href="#">
                        <i class="demo-pli-list-view"></i>
                    </a>
                </li>

                <!-- Search -->
                <li>
                    <div class="custom-search-form">
                        <label class="btn btn-trans" for="search-input" data-toggle="collapse" data-target="#nav-searchbox">
                            <i class="demo-pli-magnifi-glass"></i>
                        </label>
                        <form>
                            <div class="search-container collapse" id="nav-searchbox">
                                <input id="search-input" type="text" class="form-control" placeholder="Type for search...">
                            </div>
                        </form>
                    </div>
                </li>
            </ul>

            <ul class="nav navbar-top-links">
                <!-- Notification dropdown -->
                <li class="dropdown">
                    <!-- ... (código de notificaciones existente) ... -->
                </li>

                <!-- User dropdown -->
                <li id="dropdown-user" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                        <span class="ic-user pull-right">
                            <img class="img-circle img-user media-object" src="{{ asset('image/profile-prueba.jpg') }}" alt="Profile Picture">
                        </span>
                        <div class="username hidden-xs">{{ Auth::guard('arbitro')->user()->name }}</div>
                    </a>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                        <ul class="head-list">
                            <li>
                                <a href="{{ route('arbitro.profile.edit') }}">
                                    <i class="demo-pli-male icon-lg icon-fw"></i> Perfil
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="badge badge-danger pull-right">9</span>
                                    <i class="demo-pli-mail icon-lg icon-fw"></i> Mensajes
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-success pull-right">New</span>
                                    <i class="demo-pli-gear icon-lg icon-fw"></i> Configuración
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('arbitro.logout') }}">
                                    @csrf
                                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="demo-pli-unlock icon-lg icon-fw"></i>
                                        Cerrar Sesión
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>