<div>
    <div class="main-tabs">
        <div class="main-tab active" data-tab="kumite" >Competencias</div>
    </div>

    <div class="main-tab-content active" id="kumite">
        <!-- Sub-pestañas de Kumite -->
                                   <!-- Filtros -->
        <div class="filters">
            <div class="filter-group">
                <label class="filter-label">Categoría</label>
                <select id="kumite-category" wire:model="categoriaSeleccionada" wire:click="vertabla" class="form-control">
                    <option value="">Seleccione una categoría</option>
                    @foreach($categorias as $categoria)
                    @if($categoria->disciplina=='Kumite')
                    <option value="{{ $categoria->id }}">{{ $categoria->disciplina }} - {{ $categoria->nombre }}|{{$categoria->peso}}KG</option>
                
                @endif
                @if($categoria->disciplina=='Kata')
                    <option value="{{ $categoria->id }}">{{ $categoria->disciplina }} - {{ $categoria->nombre }}</option>
                
                @endif
                    @endforeach
                </select>
            </div>


        </div>

        <button wire:click="abrirModal" id="kumite-filter">Inscribir</button>
    </div>
    @if($mostrarModal)
    <div class="swal-modal-overlay">
        <div class="swal-modal" style="max-width: 700px;">
            <div class="swal-modal-header">
                <h3>INSCRIPCION</h3>
                <button wire:click="cerrarModal" class="swal-close">&times;</button>
            </div>
            
            <div class="swal-modal-body">
                <form wire:submit.prevent="guardarRelacion">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Competencia *</label>
                                <select wire:model="competenciaSeleccionada" class="form-control" required>
                                    <option value="" disabled>Seleccione una competencia</option>
                                    @foreach( $categorias as $categoria)
                                    @if($categoria->disciplina=='Kumite')
                                        <option value="{{ $categoria->id }}">{{ $categoria->disciplina }} - {{ $categoria->nombre }}|{{$categoria->peso}}KG</option>
                                    
                                    @endif
                                    @if($categoria->disciplina=='Kata')
                                        <option value="{{ $categoria->id }}">{{ $categoria->disciplina }} - {{ $categoria->nombre }}</option>
                                    
                                    @endif
                                        
                                    @endforeach
                                </select>
                                @error('competenciaSeleccionada') <span class="text-error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Participantes *</label>
                                <select wire:model="participantesSeleccionados" class="form-control" multiple required>
                                    <option value="" disabled>Seleccione uno o más participantes</option>
                                    @foreach($participantesDisponibles as $participante)
                                        <option value="{{ $participante->id }}">{{ $participante->primer_nombre }} {{ $participante->primer_apellido }} - {{ $participante->dojo }}</option>
                                    @endforeach
                                </select>
                                @error('participantesSeleccionados') <span class="text-error">{{ $message}}</span> @enderror
                            </div>
                        </div>
                    </div>
            
                    <div class="row mt-3">
                        <div class="col-md-12 text-right">
                            <button wire:click="cerrarModal" class="btn btn-secondary">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar Relación</button>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 text-right">
                            <button type="button" wire:click="seleccionar32" class="btn btn-info">Seleccionar 32 Participantes</button>
                        </div>
                    </div>
                </form>
            </div>
    @endif
    <!-- Fase de Grupos -->
    @if ($table)
    <div class="sub-tab-content active" id="groups-content">
        <h3>Todos los Competidores</h3>
        <div class="table-container">
            <table id="kata-competitors-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Dojo</th>
                        <th>Edad</th>
                        <th>Cinta</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($participantes as $participante)
                    <tr>
                        <td>{{$participante->primer_nombre}} {{$participante->primer_apellido}}</td>
                        <td>{{$participante->dojo}}</td>
                        <td>{{$participante->edad}}</td>
                        <td>{{$participante->cinturon}}</td>
                    </tr>
                        
                    @endforeach
                    <!-- Datos generados dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>
    @if ($competencia->grupos->first()!=null)
    <button wire:click="grupos" id="kumite-filter">GRUPOS</button>
    
    @endif
    @if ($competencia->grupos->first()===null)
    <button wire:click="sorteo" id="kumite-filter">SORTEAR</button>
    
    @endif
    
    @endif
    
</div>
