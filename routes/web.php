<?php

use App\Http\Controllers\kata\panelcontrol as KataPanelcontrol;
use App\Http\Controllers\kumite\panelcontrol as KumitePanelcontrol;
use App\Http\Controllers\CombatesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuntajeController;
use App\Http\Controllers\RoleController;
use App\Models\Combate;
use App\Models\competencia;
use App\Models\puntoskumite;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/role', [RoleController::class, 'index'])->name('role');

    Route::get('/kata/scoreboard/{id_combate}', [KataPanelcontrol::class, 'index'])->name('kata.scoreboard');

    Route::get('/kata/live', function () {
       
        return view('Scoreboards.Katalive');
    });

    Route::get('/kumite/scoreboard/{id_combate}', [KumitePanelcontrol::class, 'index'])->name('kumite.scoreboard');

    Route::get('/kumite/live', function () {
       
        return view('Scoreboards.Kumitelive');
    });


    Route::get('/api', function () {
        
        return CombatesController::gruposkumite('grupo1',1,[10,11,12,13],2,1);
    })->name('api');

    Route::get('/tabla-participantes', function () {
        return view('tabla-participantes');
    })->name('tabla-participantes');
});

require __DIR__ . '/auth.php';
