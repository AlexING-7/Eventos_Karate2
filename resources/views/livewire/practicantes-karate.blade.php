<div id="page-content">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Participantes de Karate</h3>
        </div>
    
        <div class="panel-body">
            <div class="pad-btm form-inline">
                <div class="row">
                    <div class="col-sm-6 table-toolbar-left">
                        <button wire:click="abrirModal" class="btn btn-purple">
                            <i class="demo-pli-add"></i> Agregar
                        </button>
                    </div>
                    <div class="col-sm-6 table-toolbar-right">
                        <div class="form-group">
                            <input wire:model="search" type="text" placeholder="Buscar..." class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre Completo</th>
                            <th class="text-center">Edad</th>
                            <th class="text-center">Género</th>
                            <th class="text-center">Peso (kg)</th>
                            <th class="text-center">Estatura (Mts)</th>
                            <th class="text-center">Cinta</th>
                            <th>Dojo</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($participantes as $participante)
                        <tr>
                            <td>{{ $participante->nombre_completo }}</td>
                            <td class="text-center">{{ $participante->edad }}</td>
                            <td class="text-center">{{ $participante->genero }}</td>
                            <td class="text-center">{{ $participante->peso }}</td>
                            <td class="text-center">{{ $participante->estatura }}</td>
                            <td class="text-center">
                                <div class="label label-table" style="background-color: {{ $this->getColorCinta($participante->cinturon) }}; color: @if($participante->cinturon == 'Blanca') black @else white @endif;">
                                    {{ $participante->cinturon }}
                                </div>
                            </td>
                            <td>{{ $participante->dojo }}</td>
                            <td class="text-center">
                                <button wire:click="abrirModalInfo({{ $participante->id }})" class="btn btn-sm btn-info">
                                    <i class="demo-pli-information"></i>
                                </button>
                                <button wire:click="editarPracticante({{ $participante->id }})" class="btn btn-sm btn-warning">
                                    <i class="demo-pli-pencil"></i>
                                </button>
                                <button wire:click="eliminarPracticante({{ $participante->id }})" class="btn btn-sm btn-danger">
                                    <i class="demo-pli-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal de añadir/editar -->
    @if($modalAbierto)
        <div class="swal-modal-overlay">
            <div class="swal-modal" style="max-width: 700px;">
                <div class="swal-modal-header">
                    <h3>{{ $editando ? 'Editar' : 'Agregar' }} Participante</h3>
                    <button wire:click="cerrarModal" class="swal-close">&times;</button>
                </div>
                
                <div class="swal-modal-body">
                    <form wire:submit.prevent="guardarPracticante">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Primer Nombre *</label>
                                    <input wire:model="primer_nombre" type="text" class="form-control">
                                    @error('primer_nombre') <span class="text-error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Segundo Nombre</label>
                                    <input wire:model="segundo_nombre" type="text" class="form-control">
                                    @error('segundo_nombre') <span class="text-error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Primer Apellido *</label>
                                    <input wire:model="primer_apellido" type="text" class="form-control">
                                    @error('primer_apellido') <span class="text-error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Segundo Apellido</label>
                                    <input wire:model="segundo_apellido" type="text" class="form-control">
                                    @error('segundo_apellido') <span class="text-error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fecha de Nacimiento *</label>
                                    <input wire:model="fecha_nacimiento" type="date" class="form-control">
                                    @error('fecha_nacimiento') <span class="text-error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Género *</label>
                                    <select wire:model="genero" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                    @error('genero') <span class="text-error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Peso (kg) *</label>
                                    <input wire:model="peso" type="number" step="0.1" class="form-control">
                                    @error('peso') <span class="text-error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Estatura (Mts) *</label>
                                    <input wire:model="estatura" type="number" step="0.01" class="form-control">
                                    @error('estatura') <span class="text-error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cinta *</label>
                                    <select wire:model="cinturon" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <option value="Blanca">Blanca</option>
                                        <option value="Amarilla">Amarilla</option>
                                        <option value="Naranja">Naranja</option>
                                        <option value="Verde">Verde</option>
                                        <option value="Azul">Azul</option>
                                        <option value="Marrón">Marrón</option>
                                        <option value="Negra">Negra</option>
                                    </select>
                                    @error('cinturon') <span class="text-error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Dojo *</label>
                            <input wire:model="dojo" type="text" class="form-control">
                            @error('dojo') <span class="text-error">{{ $message }}</span> @enderror
                        </div>
                    </form>
                </div>
                
                <div class="swal-modal-footer">
                    <button wire:click="cerrarModal" class="swal-btn swal-btn-cancel">Cancelar</button>
                    <button wire:click="guardarPracticante" class="swal-btn swal-btn-confirm">
                        {{ $editando ? 'Actualizar' : 'Guardar' }}
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal para info -->
    @if($modalInfoAbierto)
        @php
            $participante = \App\Models\participantes::find($participanteId);
        @endphp
        <div class="swal-modal-overlay">
            <div class="swal-modal" style="max-width: 600px;">
                <div class="swal-modal-header">
                    <h3>Información del Participante</h3>
                    <button wire:click="cerrarModal" class="swal-close">&times;</button>
                </div>
                
                <div class="swal-modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>{{ $participante->nombre_completo }}</h4>
                            <hr>
                            <p><strong>Edad:</strong> {{ $participante->edad }} años</p>
                            <p><strong>Fecha de Nacimiento:</strong> {{ $participante->fecha_nacimiento->format('d/m/Y') }}</p>
                            <p><strong>Género:</strong> {{ $participante->genero }}</p>
                            <p><strong>Peso:</strong> {{ $participante->peso }} kg</p>
                            <p><strong>Estatura:</strong> {{ $participante->estatura }} m</p>
                            <p>
                                <strong>Cinta:</strong> 
                                <span class="label" style="background-color: {{ $this->getColorCinta($participante->cinturon) }}; color: @if($participante->cinturon == 'Blanca') black @else white @endif;">
                                    {{ $participante->cinturon }}
                                </span>
                            </p>
                            <p><strong>Dojo:</strong> {{ $participante->dojo }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="swal-modal-footer">
                    <button wire:click="cerrarModal" class="swal-btn swal-btn-confirm">Cerrar</button>
                </div>
            </div>
        </div>
    @endif
</div>