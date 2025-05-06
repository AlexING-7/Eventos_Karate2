<nav id="mainnav-container">
    <div id="mainnav">


        <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
        <!--It will only appear on small screen devices.-->
        <!--================================
        <div class="mainnav-brand">
            <a href="index.html" class="brand">
                <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
                <span class="brand-text">Nifty</span>
            </a>
            <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
        </div>
        -->



        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">

                    <!--Profile Widget-->
                    <!--================================-->
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap text-center">
                            <div class="pad-btm">
                                <img class="img-circle img-md" src="{{asset('image/profile-prueba.jpg')}}" alt="Profile Picture">
                            </div>
                                <p class="mnp-name">{{ Auth::user()->name }}</p>
                                <span class="mnp-desc">{{ Auth::user()->email }}</span>
                            </a>
                        </div>
                    </div>

                    <ul id="mainnav-menu" class="list-group">
            
                        <!--Category name-->
                        <li class="list-header">Navigation</li>
            
                        <!--Menu list item-->
                        <li class="{{request()->routeIs('dashboard') ? 'active-sub' : ''}}">
                            <a href="{{route('dashboard')}}" style="cursor: pointer;">
                                <i class="demo-pli-home"></i>
                                <span class="menu-title">Panel</span>
                            </a>
                        </li>
                        <li class="{{request()->routeIs('tabla-participantes') ? 'active-sub' : ''}}">
                            <a href="{{route('tabla-participantes')}}" style="cursor: pointer;">
                                <i class="demo-pli-home"></i>
                                <span class="menu-title">Tablas participantes</span>
                            </a>
                        </li>

                        <li class="{{request()->routeIs('evento') ? 'active-sub' : ''}}">
                            <a href="{{route('evento')}}" style="cursor: pointer;">
                                <i class="demo-pli-home"></i>
                                <span class="menu-title">Evento</span>
                            </a>
                        </li>
            
                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="demo-pli-split-vertical-2"></i>
                                <span class="menu-title">Layouts</span>
                                <i class="arrow"></i>
                            </a>
            
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="layouts-collapsed-navigation.html">Collapsed Navigation</a></li>
                                <li><a href="layouts-offcanvas-navigation.html">Off-Canvas Navigation</a></li>
                                <li><a href="layouts-offcanvas-slide-in-navigation.html">Slide-in Navigation</a></li>			
                            </ul>
                        </li>                        

                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>