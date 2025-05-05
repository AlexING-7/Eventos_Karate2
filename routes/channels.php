<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('timer-channel.{id_combate}', function ($user, $id_combate) {
    // Opcional: verifica si el usuario tiene acceso al combate
    return true; // Cambia esto según tu lógica de autorización
});
