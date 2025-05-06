<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\evento;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; 

class ListaEvento extends Component
{
    use WithFileUploads;

    public $contadorVisible = 3;
    public $mostrarModal = false;
    public $nuevoEvento = [
        'nombre' => '',
        'fecha' => '',
        'localizacion' => '',
        'descripcion' => ''
    ];
    public $imagenTemporal;


    public function getMostrarCrearEventoProperty()
    {
        return Auth::check();
    }

    public function abrirModal()
    {
        $this->reset(['nuevoEvento', 'imagenTemporal']);
        $this->mostrarModal = true;
    }

    public function cerrarModal()
    {
        $this->mostrarModal = false;
    }
    public function guardarEvento()
{
    $this->validate([
        'nuevoEvento.nombre' => 'required|string|min:5',
        'nuevoEvento.fecha' => 'required|date',
        'nuevoEvento.localizacion' => 'required|string',
        'imagenTemporal' => 'nullable|image|max:2048',
    ]);

    try {
        $datosEvento = $this->nuevoEvento;
        $datosEvento['imagen'] = null; 

        if ($this->imagenTemporal) {

            if (!$this->imagenTemporal->getRealPath()) {
                throw new \Exception("El archivo temporal no existe");
            }


            if (!File::isDirectory(public_path('image'))) {
                File::makeDirectory(public_path('image'), 0755, true);
            }


            $extension = $this->imagenTemporal->getClientOriginalExtension();
            $nombreImagen = Str::slug($this->nuevoEvento['nombre']) . '-' . uniqid() . '.' . $extension;


            $tempPath = $this->imagenTemporal->getRealPath();
            $nuevoPath = public_path('image/'.$nombreImagen);
            
            if (!copy($tempPath, $nuevoPath)) {
                throw new \Exception("Error al copiar la imagen");
            }

            $datosEvento['imagen'] = $nombreImagen;
        }


        \Log::info('Datos a guardar:', $datosEvento);

        $evento = evento::create($datosEvento);


        if (!$evento->wasRecentlyCreated) {
            throw new \Exception("No se pudo crear el evento en la base de datos");
        }

        $this->cerrarModal();
        $this->dispatch('evento-creado')->self();

    } catch (\Exception $e) {
        \Log::error('Error al guardar evento: '.$e->getMessage());
        $this->addError('error', 'Error al guardar: '.$e->getMessage());
    }
}


    public function cargarMasEventos()
    {
        $this->contadorVisible += 3;
    }

    public function getEventosVisiblesProperty()
    {
        return evento::latest()
            ->take($this->contadorVisible)
            ->get()
            ->map->toLivewireArray();
    }

    public function getHayMasEventosProperty()
    {
        return evento::count() > $this->contadorVisible;
    }

    public function render()
    {
        return view('livewire.lista-evento', [
            'eventosVisibles' => $this->eventosVisibles,
            'hayMasEventos' => $this->hayMasEventos,
            'mostrarCrearEvento' => $this->mostrarCrearEvento
        ]);
    }
}