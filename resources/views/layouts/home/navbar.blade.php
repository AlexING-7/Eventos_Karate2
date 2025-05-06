<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{route('home')}}">
        <img src="{{asset('image/asokarate.png')}}" alt="Logo" class="brand-icon" style=" width: 10%; high: 10%;">
              
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">Sobre nosotros</a></li>
          <li><a href="#services">Servicios</a></li>
          <li><a href="#contact">Contacto</a></li>

          <li><a href="{{route('arbitro.login')}}">Soy Arbitro</a></li>
          <div class="navbar-nav">
          @if (Auth::check())
              <li><a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Dashboard</a></li>                     
          @else
              <li><a href="{{route('login')}}">Iniciar sesion</a></li>
          @endif
          
        </div>

        
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>
