<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\participantes;

class PracticantesKarate extends Component
{
    public $modalAbierto = false;
    public $modalInfoAbierto = false;
    public $editando = false;
    public $participanteId;

    public $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido;
    public $fecha_nacimiento, $genero, $peso, $estatura, $cinturon, $dojo;
    
    public $search = '';

    protected $rules = [
        'primer_nombre' => 'required|string|max:50',
        'segundo_nombre' => 'nullable|string|max:50',
        'primer_apellido' => 'required|string|max:50',
        'segundo_apellido' => 'nullable|string|max:50',
        'fecha_nacimiento' => 'required|date',
        'genero' => 'required|in:Masculino,Femenino',
        'peso' => 'required|numeric|min:20|max:200',
        'estatura' => 'required|numeric|min:1|max:2.5',
        'cinturon' => 'required|in:Blanca,Amarilla,Naranja,Verde,Azul,Marrón,Negra',
        'dojo' => 'required|string|max:100',
    ];

    public function render()
    {
        $participantes = participantes::when($this->search, function($query) {
            $query->where('primer_nombre', 'like', '%'.$this->search.'%')
                  ->orWhere('primer_apellido', 'like', '%'.$this->search.'%');
        })->latest()->get();

        return view('livewire.practicantes-karate', [
            'participantes' => $participantes
        ]);
    }

    public function abrirModal()
    {
        $this->modalAbierto = true;
        $this->editando = false;
    }

    public function abrirModalInfo($id)
    {
        $this->modalInfoAbierto = true;
        $this->participanteId = $id;
    }

    public function cerrarModal()
    {
        $this->modalAbierto = false;
        $this->modalInfoAbierto = false;
        $this->reset();
        $this->resetErrorBag();
    }

    public function editarPracticante($id)
    {
        $participante = participantes::findOrFail($id);
        
        $this->participanteId = $id;
        $this->primer_nombre = $participante->primer_nombre;
        $this->segundo_nombre = $participante->segundo_nombre;
        $this->primer_apellido = $participante->primer_apellido;
        $this->segundo_apellido = $participante->segundo_apellido;
        $this->fecha_nacimiento = $participante->fecha_nacimiento->format('Y-m-d');
        $this->genero = $participante->genero;
        $this->peso = $participante->peso;
        $this->estatura = $participante->estatura;
        $this->cinturon = $participante->cinturon;
        $this->dojo = $participante->dojo;
        
        $this->editando = true;
        $this->modalAbierto = true;
    }

    public function guardarPracticante()
    {
        $this->validate();
    
        $data = [
            'primer_nombre' => $this->primer_nombre,
            'segundo_nombre' => $this->segundo_nombre,
            'primer_apellido' => $this->primer_apellido,
            'segundo_apellido' => $this->segundo_apellido,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'genero' => $this->genero,
            'peso' => $this->peso,
            'estatura' => $this->estatura,
            'cinturon' => $this->cinturon,
            'dojo' => $this->dojo,
        ];
    
        if ($this->editando) {
            $participante = participantes::find($this->participanteId);
            $participante->update($data);
            $message = 'Participante actualizado correctamente.';
        } else {
            participantes::create($data);
            $message = 'Participante agregado correctamente.';
        }
    
        $this->cerrarModal();
        session()->flash('message', $message);
    }

    public function eliminarPracticante($id)
    {
        $participante = participantes::findOrFail($id);
        $participante->delete();
        session()->flash('message', 'Participante eliminado correctamente.');
    }

    public function getColorCinta($cinta)
    {
        $colores = [
            'Blanca' => '#EAEAEA',   // Blanco grisáceo
            'Amarilla' => '#FFC107', // Ámbar
            'Naranja' => '#FF7043',  // Naranja oscuro
            'Verde' => '#388E3C',    // Verde oscuro
            'Azul' => '#1976D2',     // Azul oscuro
            'Marrón' => '#5D4037',   // Marrón café
            'Negra' => '#212121'     // Negro carbón
        ];
        
        return $colores[$cinta] ?? '#CCCCCC';
    }
}