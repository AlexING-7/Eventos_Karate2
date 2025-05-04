{{-- filepath: c:\Users\Febe\Desktop\Karate\Eventos_Karate2\resources\views\sorteo.blade.php --}}
<x-app-layout>
    <style>
        /* Estilos personalizados para las cards */
        .custom-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            overflow: hidden;
            width: 280px; /* Ancho fijo para que todas tengan el mismo tamaño */
            background-color: #fff;
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
                        @if(isset($data['groups']))
                            <div class="flex-container">
                                @foreach($data['groups'] as $index => $group)
                                    <div class="flex-item">
                                        <div class="card custom-card h-100">
                                            <div class="card-header bg-primary text-white">
                                                Grupo {{ $index + 1 }}
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                @foreach($group->participantes as $participant)
                                                    @php
                                                        // Invoca la función estática para obtener el puntaje del participante en este grupo.
                                                        $puntaje = \App\Http\Controllers\PuntajeController::puntajegrupo_Kumite($group->id, $participant->id);
                                                    @endphp
                                                    <li class="list-group-item">
                                                        {{ $participant->nombre_completo }} - {{ $participant->dojo }} - Puntaje: {{ $puntaje }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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