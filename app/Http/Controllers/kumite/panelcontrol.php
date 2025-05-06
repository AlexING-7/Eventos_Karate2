<?php

namespace App\Http\Controllers\kumite;

use App\Http\Controllers\Controller;
use App\Models\Combate;
use Illuminate\Http\Request;

class panelcontrol extends Controller
{
    public function index($id_combate)
    {
        $combate=Combate::find($id_combate); 
        $remaining = $combate->competencia->categoria->duracion*60;
        return view('Scoreboards.PanelKumite', ['id_combate'=>$id_combate,'remaining'=>$remaining]);
    }

    public function live($id_combate)
    {
        $combate=Combate::find($id_combate); 
        return view('Scoreboards.kumitelive', ['id_combate' => $id_combate]);
    }
}
