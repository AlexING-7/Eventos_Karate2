<?php

namespace App\Livewire;

use App\Http\Controllers\CombatesController;
use App\Models\categoria;
use App\Models\competencia;
use App\Models\evento;
use App\Models\participantes;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Livewire\Component;
use SebastianBergmann\Type\TrueType;

class Combatientes extends Component
{
    public $categorias;

    public $evento;

    public $competencia;
    public $categoriaSeleccionada = null;

    public $mostrarModal = false;

    public $competenciasDisponibles = [];
    public $participantesDisponibles = [];
    public $competenciaSeleccionada;
    public $participantesSeleccionados = [];

    public $table=False;
    public $participantes;
    public function render()
    {
        return view('livewire.combatientes');
    }

    public function mount($categorias)
    {
        
        $this->participantesDisponibles = participantes::all();
    }

    public function grupos(){
        return redirect()->route('eventos.grupos',[$this->evento->id,$this->competencia->id]);
    }

    public function abrirModal()
    {
        
        $this->mostrarModal = true;
    }

    public function cerrarModal()
    {
        $this->mostrarModal = false;
    }

    public function guardarRelacion()
    {
        $this->validate([
            'competenciaSeleccionada' => 'required|exists:categorias,id',
            'participantesSeleccionados' => 'required|array|min:1',
            'participantesSeleccionados.*' => 'exists:participantes,id',
        ]);

        $competencia = competencia::where('id_categoria',$this->competenciaSeleccionada)->where('id_evento',$this->evento->id)->first();

        // Asocia los participantes seleccionados a la competencia
        $competencia->participantes()->sync($this->participantesSeleccionados);

        // Resetea los campos y cierra el modal
        $this->reset(['competenciaSeleccionada', 'participantesSeleccionados']);
        $this->cerrarModal();

    }

    public function seleccionar32()
    {
        // Selecciona automáticamente los primeros 32 participantes disponibles
        $this->participantesSeleccionados = $this->participantesDisponibles->take(32)->pluck('id')->toArray();
    }

    public function vertabla()  {
    if(competencia::where('id_categoria',$this->categoriaSeleccionada)->where('id_evento',$this->evento->id)->first()!==null){
        $this->competencia = competencia::where('id_categoria',$this->categoriaSeleccionada)->where('id_evento',$this->evento->id)->first();
        $this->participantes=$this->competencia->participantes;
        $this->table=true;
    }

    }

    public function sorteo(){
        $arrayparticipantes=array();
        foreach($this->participantes as $participante){
            $arrayparticipantes[]=$participante->id;
        }
        
        $grupos=CombatesController::sortear($arrayparticipantes);
        $categoria=categoria::find($this->categoriaSeleccionada);
        foreach($grupos as $index => $grupo){
            if($categoria->disciplina==='Kumite'){
                CombatesController::gruposkumite("Grupo ".$index+1,$index,$grupo,$this->competencia->id,1);
            }
            
        }
        return redirect()->route('eventos.grupos',[$this->evento->id,$this->competencia->id]);
        
    }
}
