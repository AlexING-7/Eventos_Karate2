<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\competencia;
use App\Models\evento as ModelsEvento;
use Illuminate\Http\Request;

class evento extends Controller
{
    public function index($id_evento)
    {
        // Busca el evento por su ID
        $evento = ModelsEvento::findOrFail($id_evento);
        $categorias = $evento->categorias;
        
        // Retorna la vista con los datos del evento
        return view('competencia', compact('evento', 'categorias'));
    }

    public function grupos($id_evento,$id_competencia)
    {
        // Busca el evento por su ID
        $competencia = competencia::findOrFail($id_competencia);
        $grupos = $competencia->grupos;
        
        // Retorna la vista con los datos del evento
        return view('grupos', compact('competencia', 'grupos'));
    }
    
}
