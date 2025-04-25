<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Combate;
use App\Models\competencia;
use App\Models\participantes;
use App\Models\Puntokata;
use Illuminate\Http\Request;

class PuntajeController extends Controller
{
    public static function puntajetotal_Kumite($id_competencia,$id_participante)
    {
        //en produccion 
        $participante=participantes::find($id_participante);
        $participante->combates()->where('id_competencia',$id_competencia)->get();

                
    }
}
