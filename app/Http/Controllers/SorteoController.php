<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\participantes;
use App\Models\categoria;
use App\Models\Grupo;

class SorteoController extends Controller
{
    public function sortear(Request $request)
    {
        $allParticipants = participantes::all();
        $categories = categoria::all();
        $result = [];
        $maxAttempts = 100;

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

            // En este escenario ya no se crean nuevos grupos,
            // se cargan los grupos existentes para esta categoría.
            // Se asume que el nombre del grupo contiene el nombre de la categoría.
            $existingGroups = Grupo::with('participantes')
                ->where('nombre', 'like', '%' . $cat->nombre . '%')
                ->get();

            if ($existingGroups->isEmpty()) {
                $result[$cat->nombre] = [
                    'error' => 'No existen grupos previos para la categoría ' . $cat->nombre
                ];
            } else {
                $result[$cat->nombre] = [
                    'message' => 'Grupos cargados exitosamente',
                    'groups' => $existingGroups
                ];
            }
        }

        return $request->wantsJson()
            ? response()->json($result)
            : view('sorteo', compact('result'));
    }
}

//   // Guardar los grupos en la BD usando el modelo Grupo
//   $savedGroups = [];
//   foreach ($groups as $index => $groupParticipants) {
//       $grupoRecord = Grupo::create([
//           'nombre' => $cat->nombre . ' Grupo ' . ($index + 1),
//           'numero' => $index + 1,
//           'id_competencia' => 1 // O asignar un valor de competencia según corresponda
//       ]);
      
//       // Recopilar los IDs de los participantes y asignarlos al grupo
//       $participantIDs = [];
//       foreach ($groupParticipants as $p) {
//           $participantIDs[] = $p->id;
//       }
//       $grupoRecord->participantes()->attach($participantIDs);
      
//       $savedGroups[] = $grupoRecord;
//   }
//   $result[$cat->nombre] = [
//       'message' => 'Sorteo realizado exitosamente',
//       'groups' => $savedGroups
//   ];
// }
// }