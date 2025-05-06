<div>
<div>
    <!-- Modal con las clases idénticas al ejemplo -->
    @if($mostrarModal)
        <div class="swal-modal-overlay">
            <div class="swal-modal" style="max-width: 700px;">
                <div class="swal-modal-header">
                    <h3>Crear Nuevo Evento</h3>
                    <button wire:click="cerrarModal" class="swal-close">&times;</button>
                </div>
                
                <div class="swal-modal-body">
                    <form wire:submit.prevent="guardarEvento">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Título del Evento *</label>
                                    <input type="text" wire:model="nuevoEvento.nombre" class="form-control" required>
                                    @error('nuevoEvento.nombre') <span class="text-error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fecha *</label>
                                    <input type="datetime-local" wire:model="nuevoEvento.fecha" class="form-control" required>
                                    @error('nuevoEvento.fecha') <span class="text-error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ubicación *</label>
                                    <input type="text" wire:model="nuevoEvento.localizacion" class="form-control" required>
                                    @error('nuevoEvento.localizacion') <span class="text-error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea wire:model="nuevoEvento.descripcion" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Imagen del Evento</label>
                                    <input type="file" wire:model="imagenTemporal" class="form-control">
                                    @if($imagenTemporal)
                                        <div class="mt-2">
                                            <img src="{{ $imagenTemporal->temporaryUrl() }}" alt="Vista previa" width="100" class="img-thumbnail">
                                        </div>
                                    @endif
                                    @error('imagenTemporal') <span class="text-error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Categorías</label>
                                    <select wire:model="categoriasSeleccionadas" class="form-control" multiple>
                                        <option value="" disabled>Seleccione una o más categorías</option>
                                        @foreach($categoriasDisponibles as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->disciplina }} {{ $categoria->nombre }} | {{$categoria->peso}}KG</option>
                                        @endforeach
                                    </select>
                                    @error('categoriasSeleccionadas') <span class="text-error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="swal-modal-footer">
                    <button wire:click="cerrarModal" class="swal-btn swal-btn-cancel">Cancelar</button>
                    <button wire:click="guardarEvento" class="swal-btn swal-btn-confirm">Guardar</button>
                </div>
            </div>
        </div>
    @endif
    <!-- Sección de Eventos -->
    <div class="section-title-container">
        @if($mostrarCrearEvento)
            <div class="centrar-boton">
                <button wire:click="abrirModal" class="boton-crear">
                    Crear Nuevo Evento
                </button>
            </div>
        @endif
    </div>

    <div class="wrapper-eventos">
        <div class="rejilla-eventos">
            @foreach($eventosVisibles as $evento)
                <div class="elemento-evento">
                    <img src="{{ $evento['imagen'] }}" alt="{{ $evento['titulo'] }}" class="imagen-evento">
                    <div class="contenido-evento">
                        <h3>{{ $evento['titulo'] }}</h3>
                        <p><strong>Fecha:</strong> {{ $evento['fecha'] }}</p>
                        <p><strong>Ubicación:</strong> {{ $evento['ubicacion'] }}</p>
                        @auth
                        <!-- Enlace para usuarios logueados -->
                        <a href="{{ route('eventos.index',$evento['id']) }}" class="enlace-evento">
                            Más información <i class="fas fa-chevron-right"></i>
                        </a>
                    @else
                        <!-- Enlace para usuarios NO logueados -->
                        <a href="{{ route('competencia-home') }}" class="enlace-evento">
                            Más información <i class="fas fa-chevron-right"></i>
                        </a>
                    @endauth
                    </div>
                </div>
            @endforeach
        </div>

        @if ($hayMasEventos)
            <button class="boton-cargar-mas" 
                    wire:click="cargarMasEventos" 
                    wire:loading.attr="disabled"
                    wire:target="cargarMasEventos">
                <span wire:loading.remove wire:target="cargarMasEventos">Ver más</span>
                <span wire:loading wire:target="cargarMasEventos">Cargando...</span>
            </button>
        @else
            <button class="boton-cargar-mas" disabled style="background-color: gray;">No hay más eventos</button>
        @endif
    </div>
</div>

