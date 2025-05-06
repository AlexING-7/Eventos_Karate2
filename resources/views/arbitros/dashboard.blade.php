<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ASOKarate</title>

    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nifty.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nifty-demo-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body class="font-sans">
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        <!--NAVBAR-->
        @include('arbitros.layouts.navbar')    

        <!--MAIN NAVIGATION-->
        @include('arbitros.layouts.main-navbar')

        <!-- MAIN CONTENT -->
        <div class="boxed">
            <!--CONTENT CONTAINER-->
            <div id="content-container">
                <div id="page-head">
                    <div class="pad-all text-center">
                        <h3>Bienvenido de Vuelta</h3>
                        <p class="subtitle">Mira las Estadísticas de la Asociación</p>                
                    </div>
                </div>

                <!--Page content-->
                <div class="page-content">
                    <div class="dashboard-grid">
                        <!-- Card 1 -->
                        <div class="dashboard-card animate__animated animate__fadeInUp animate__delay-1s">
                            <div class="horizontal-card-content">
                                <div class="card-image">
                                    <img src="{{ asset('image/participantes.jpg') }}" alt="Participantes">
                                </div>
                                <div class="card-info">
                                    <h3>Participantes</h3>
                                    <p>Tabla participantes</p>
                                    <a href="{{ route('tabla-participantes') }}" class="view-btn">Ver</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="dashboard-card animate__animated animate__fadeInUp animate__delay-2s">
                            <div class="horizontal-card-content">
                                <div class="card-image">
                                    <img src="{{ asset('image/evento.jpg') }}" alt="Eventos">
                                </div>
                                <div class="card-info">
                                    <h3>Evento</h3>
                                    <p>Gestionar evento</p>
                                    <a href="{{ route('evento') }}" class="view-btn">Ver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        @include('arbitros.layouts.footer')

        <!-- SCROLL PAGE BUTTON -->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
    </div>

    <!-- JavaScript Files -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/nifty.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    @livewireScripts

    <style>
        /* Estilos generales */
        .subtitle {
            color: #6c757d;
            font-size: 1.1rem;
            margin-top: 0.5rem;
        }
        
        .page-content {
            padding: 2rem;
        }
        
        /* Grid de tarjetas */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            padding: 1rem;
        }
        
        /* Tarjetas */
        .dashboard-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        
        .dashboard-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        
        /* Contenedor horizontal */
        .horizontal-card-content {
            display: flex;
            height: 100%;
        }
        
        /* Imagen al lado */
        .card-image {
            width: 120px;
            height: auto;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            padding: 1rem;
            flex-shrink: 0;
        }
        
        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
        }
        
        .dashboard-card:hover .card-image img {
            transform: scale(1.05);
        }
        
        /* Contenido de texto */
        .card-info {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .card-info h3 {
            margin-top: 0;
            color: #343a40;
            font-size: 1.4rem;
        }
        
        .card-info p {
            color: #6c757d;
            flex-grow: 1;
        }
        
        /* Botón Ver */
        .view-btn {
            display: inline-block;
            background: #4e73df;
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 50px;
            text-decoration: none;
            text-align: center;
            font-weight: 600;
            transition: background 0.3s ease;
            margin-top: auto;
            align-self: flex-start;
        }
        
        .view-btn:hover {
            background: #2e59d9;
            color: white;
        }
        
        /* Animaciones */
        @media (prefers-reduced-motion: no-preference) {
            .animate__animated {
                animation-duration: 1s;
                animation-fill-mode: both;
            }
            
            .animate__fadeInUp {
                animation-name: fadeInUp;
            }
            
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .animate__delay-1s {
                animation-delay: 0.3s;
            }
            
            .animate__delay-2s {
                animation-delay: 0.6s;
            }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        
        @media (max-width: 480px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            gap: 1rem;
            padding: 0.5rem;
            margin-top: 1rem;
            margin-bottom: 1rem;
            min-height: 0;
            overflow: hidden;
            will-change: transform;
            backface-visibility: hidden;
            perspective: 1000px;
            transform-style: preserve-3d;
        }
            
            .page-content {
                padding: 1rem;
            }
            
            /* Cambio a vertical en móviles */
            .horizontal-card-content {
                flex-direction: column;
            }
            
            .card-image {
                width: 100%;
                height: 150px;
            }
        }
    </style>
</body>
</html>