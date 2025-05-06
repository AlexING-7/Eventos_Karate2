<?php

namespace App\Livewire;

use App\Models\Combate;
use App\Models\Grupo;
use App\Models\Ronda;
use Livewire\Component;

class Grupos extends Component
{
    public $grupos;
    public $competencia;

    public $grupoSeleccionado;

    public $rondaSeleccionado;

    public $combateSeleccionado;

    public $combates;

    public $rondas;

    public function ronda(){
        if($this->grupoSeleccionado!=null && $this->grupoSeleccionado!=''){
            $ronda=Ronda::where('id_grupo',$this->grupoSeleccionado)->get();
            $this->rondas=$ronda;
        }
        
    }
    public function combate(){
        if($this->rondaSeleccionado!=null && $this->rondaSeleccionado!=''){
            $c=Combate::where('id_ronda',$this->rondaSeleccionado)->get();
            $this->combates=$c;
        }
        
    }

    public function ir(){
        return redirect()->route('kumite.scoreboard',$this->combateSeleccionado);
        
    }
    public function render()
    {
        return view('livewire.grupos');
    }
}
