<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\participantes;
use App\Models\categoria;
use App\Http\Controllers\CombatesController;

class SorteoController extends Controller
{
    public function sortear(Request $request)
    {
        $allParticipants = participantes::all();
        $categories = categoria::all();
        $result = [];
        $maxAttempts = 100;  // (Si lo llegas a necesitar en lógica anterior.)

        foreach ($categories as $cat) {
            // Filtrar participantes según la categoría:
            // Cumplen: género, edad (≥ edad_min y si existe edad_max, ≤ edad_max) y mismo peso.
            $filtered = $allParticipants->filter(function ($participant) use ($cat) {
                $age = $participant->edad;
                $ageOk = $age >= $cat->edad_min;
                if ($cat->edad_max !== null) {
                    $ageOk = $ageOk && ($age <= $cat->edad_max);
                }
                return $participant->genero === $cat->genero &&
                       $ageOk &&
                       (float)$participant->peso === (float)$cat->peso;
            })->values()->all();

            // Se exige mínimo 8 grupos de 4 participantes = 32 en total.
            if (count($filtered) < 32 || count($filtered) % 4 !== 0) {
                $result[$cat->nombre] = [
                    'error' => 'La cantidad de participantes filtrados debe ser múltiplo de 4 y al menos 32 para formar 8 grupos.'
                ];
                continue;
            }

            // Dividir a los participantes filtrados en grupos de 4
            shuffle($filtered);
            $numGroups = intdiv(count($filtered), 4);
            $gruposCreados = [];
            for ($g = 0; $g < $numGroups; $g++) {
                // Extraer 4 participantes para este grupo
                $groupParticipants = array_slice($filtered, $g * 4, 4);
                // Extraer los IDs
                $participantIDs = array_map(function($p) {
                    return $p->id;
                }, $groupParticipants);

                // Definir el nombre del grupo (por ejemplo, concatenando el nombre de la categoría y el número de grupo)
                $grupoNombre = $cat->nombre . ' Grupo ' . ($g + 1);
                // Se utilizan valores fijos para competencia y tatami (ajusta según tu lógica o provéalos vía $request)
                $id_competencia = 3;
                $id_tatami = 1;
                // Llamar a la función gruposkumite de CombatesController para crear grupo, rondas y combates
                $grupoData = CombatesController::gruposkumite($grupoNombre, $g + 1, $participantIDs, $id_competencia, $id_tatami);
                $gruposCreados[] = $grupoData;
            }

            $result[$cat->nombre] = [
                'message' => 'Grupos creados exitosamente',
                'grupos' => $gruposCreados
            ];
        }

        return $request->wantsJson()
            ? response()->json($result)
            : view('sorteo', compact('result'));
    }
    
}