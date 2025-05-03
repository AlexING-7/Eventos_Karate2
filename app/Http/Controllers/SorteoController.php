<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\participantes;
use App\Models\categoria;

class SorteoController extends Controller
{
    public function sortear(Request $request)
    {
        // Obtenemos todos los participantes de la BD
        $allParticipants = participantes::all();

        // Obtenemos todas las categorías (o filtralas según sea necesario)
        $categories = categoria::all();

        $result = [];
        $maxAttempts = 100;

        foreach ($categories as $cat) {
            // Filtramos a los participantes que cumplan con la categoría
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

            if (count($filtered) < 4 || count($filtered) % 4 !== 0) {
                $result[$cat->nombre] = [
                    'error' => 'La cantidad de participantes filtrados no es múltiplo de 4 o es insuficiente para formar grupos.'
                ];
                continue;
            }

            $successful = false;
            $groups = []; // Asegúrate de que $groups se defina aquí

            // Intentamos completar la asignación sin repetir dojo en cada grupo
            for ($attempt = 0; $attempt < $maxAttempts && !$successful; $attempt++) {
                $tempParticipants = $filtered;
                shuffle($tempParticipants);
                $numGroups = count($tempParticipants) / 4;
                $groups = array_fill(0, $numGroups, []);
                $failed = false;

                foreach ($tempParticipants as $participant) {
                    $assigned = false;
                    $groupKeys = array_keys($groups);
                    shuffle($groupKeys);

                    foreach ($groupKeys as $key) {
                        if (count($groups[$key]) >= 4) {
                            continue;
                        }
                        $dojosInGroup = array_column($groups[$key], 'dojo');
                        if (in_array($participant->dojo, $dojosInGroup)) {
                            continue;
                        }
                        $groups[$key][] = $participant;
                        $assigned = true;
                        break;
                    }
                    if (!$assigned) {
                        $failed = true;
                        break;
                    }
                }

                foreach ($groups as $group) {
                    if (count($group) < 4) {
                        $failed = true;
                        break;
                    }
                }
                if (!$failed) {
                    $successful = true;
                }
            }

            if (!$successful) {
                $result[$cat->nombre] = [
                    'error' => 'No se pudo completar la asignación tras múltiples intentos para la categoría.'
                ];
            } else {
                $result[$cat->nombre] = [
                    'message' => 'Sorteo realizado exitosamente',
                    'groups' => $groups
                ];
            }
        }

        return $request->wantsJson()
            ? response()->json($result)
            : view('sorteo', compact('result'));
    }
}