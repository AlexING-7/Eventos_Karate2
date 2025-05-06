<div>
    <div class="main-tabs">
        <div class="main-tab active" data-tab="kumite" >Grupos</div>
    </div>

    <div class="main-tab-content active" id="kumite">
        <!-- Sub-pestañas de Kumite -->
                                   <!-- Filtros -->
        <div class="filters">
            <div class="filter-group">
                <label class="filter-label">Grupo</label>
                <select id="kumite-category" wire:model="grupoSeleccionado" wire:click="ronda" class="form-control">
                    <option value="">Seleccione un grupo</option>
                    @foreach($grupos as $grupo)
                        <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                    @endforeach
                </select>
                <br>
                <br>
                <br>
                @if($grupoSeleccionado!=null)
                <select id="kumite-category" wire:model="rondaSeleccionado" wire:click="combate" class="form-control">
                    <option value="">Seleccione una ronda</option>
                    @foreach($rondas as $ronda)
                        <option value="{{ $ronda->id }}">{{ $ronda->nombre }}</option>
                    @endforeach
                </select>
                @endif
                <br>
                <br>
                <br>
                @if($rondaSeleccionado!=null)
                <select id="kumite-category" wire:model="combateSeleccionado"  class="form-control">
                    <option value="">Seleccione un combate</option>
                    @foreach($combates as $index=>$combate)
                        <option value="{{ $combate->id }}">{{ $index+1 }}</option>
                    @endforeach
                </select>
                @endif
                
            </div>


        </div>

        <button wire:click="ir" id="kumite-filter">Combate</button>
    </div>
</div>
