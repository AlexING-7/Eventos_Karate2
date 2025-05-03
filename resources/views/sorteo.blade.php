{{-- filepath: c:\Users\Febe\Desktop\Karate\Eventos_Karate2\resources\views\sorteo.blade.php --}}
<x-app-layout>
    <div class="boxed">
        <!--CONTENT CONTAINER-->
        <div id="content-container">
            <div id="page-head" class="mb-4">
                <div class="pad-all text-center">
                    <h3>Sorteo de Grupos</h3>
                    <p>Se han formado los grupos para la competencia de karate.</p>
                </div>
            </div>
            <!--Page content-->
            <div id="page-content" class="container">
                @foreach($result as $categoria => $data)
                    <div class="mb-5">
                        <h2 class="text-center">{{ $categoria }}</h2>
                        @if(isset($data['groups']))
                            <div class="row">
                                @foreach($data['groups'] as $index => $group)
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                                        <div class="card h-100">
                                            <div class="card-header bg-primary text-white">
                                                Grupo {{ $index + 1 }}
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                @foreach($group as $participant)
                                                    <li class="list-group-item">
                                                        {{ $participant->nombre_completo }} - {{ $participant->dojo }}
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
            <!--End page content-->
        </div>
        <!--END CONTENT CONTAINER-->
    </div>
</x-app-layout>