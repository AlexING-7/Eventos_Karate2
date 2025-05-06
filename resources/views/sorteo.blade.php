{{-- filepath: c:\Users\Febe\Desktop\Karate\Eventos_Karate2\resources\views\sorteo.blade.php --}}
<x-app-layout>
    <style>
        /* Estilos personalizados para las cards */
        .custom-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            overflow: hidden;
            width: 280px;
            background-color: #fff;
            margin-bottom: 1rem;
        }
        .flex-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }
        .flex-item {
            padding: 0.5rem;
        }
    </style>
    <div class="boxed">
        <!-- CONTENT CONTAINER -->
        <div id="content-container">
            <div id="page-head" class="mb-4">
                <div class="pad-all text-center">
                    <h3>Sorteo de Grupos</h3>
                    <p>Se han formado los grupos para la competencia de karate.</p>
                </div>
            </div>
            <!-- PAGE CONTENT -->
            <div id="page-content" class="container">
                @foreach($result as $categoria => $data)
                    <div class="mb-5">
                        <h2 class="text-center">{{ $categoria }}</h2>
                        @if(isset($data['grupos']))
                            @foreach($data['grupos'] as $grupoIndex => $rondas)
                                <div class="custom-card">
                                    <div class="card-header bg-primary text-white">
                                        Grupo {{ $grupoIndex + 1 }}
                                    </div>
                                    <div class="card-body">
                                        @foreach($rondas as $ronda)
                                            <h5>Ronda: {{ $ronda->nombre }}</h5>
                                            @if(isset($ronda->combates) && $ronda->combates->count() > 0)
                                                <ul class="list-group mb-3">
                                                    @foreach($ronda->combates as $combate)
                                                        <li class="list-group-item">
                                                            Combate ID: {{ $combate->id }} <br>
                                                            Participantes:
                                                            <ul>
                                                                @foreach($combate->participantes as $participant)
                                                                    @php
                                                                        // Se asume que el combate tiene una propiedad 'grupo_id'.
                                                                        $puntaje = \App\Http\Controllers\PuntajeController::puntajegrupo_Kumite($ronda->id_grupo, $participant->id);
                                                                    @endphp
                                                                    <li>
                                                                        {{ $participant->primer_nombre }} {{ $participant->segundo_nombre }} - {{ $participant->primer_apellido }} - {{ $participant->segundo_apellido }} - {{ $participant->dojo }} - Puntaje: {{ $puntaje }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p>No hay combates en esta ronda.</p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="alert alert-danger">{{ $data['error'] }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END CONTENT CONTAINER -->
    </div>
</x-app-layout>