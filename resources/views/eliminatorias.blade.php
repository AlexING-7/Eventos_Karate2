<x-app-layout>
    <style>
        /* Estilos personalizados para las cards */
        .custom-card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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
                    <h3>Eliminatorias</h3>
                    <p>Resultado de los combates eliminatorios.</p>
                </div>
            </div>
            <!-- PAGE CONTENT -->
            <div id="page-content" class="container">
                @if(isset($combates) && count($combates) > 0)
                    @foreach($combates as $combat)
                        <div class="custom-card">
                            <div class="card-header bg-danger text-white">
                                Combate Eliminatoria ID: {{ $combat->id }}
                            </div>
                            <div class="card-body">
                                <h5>Participantes:</h5>
                                <ul class="list-group mb-3">
                                    @foreach($combat->participantes as $participant)
                                        <li class="list-group-item">
                                            {{ $participant->primer_nombre }} {{ $participant->segundo_nombre }} - 
                                            {{ $participant->primer_apellido }} {{ $participant->segundo_apellido }} - 
                                            {{ $participant->dojo }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="alert alert-info">Aún no se han generado combates eliminatorios.</p>
                @endif
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END CONTENT CONTAINER -->
    </div>
</x-app-layout>