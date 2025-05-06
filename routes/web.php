<?php

use App\Http\Controllers\kata\panelcontrol as KataPanelcontrol;
use App\Http\Controllers\kumite\panelcontrol as KumitePanelcontrol;
use App\Http\Controllers\CombatesController;
use App\Http\Controllers\evento as ControllersEvento;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuntajeController;
use App\Http\Controllers\RoleController;
use App\Models\Combate;
use App\Models\competencia;
use App\Models\evento;
use App\Models\puntoskumite;
use Illuminate\Support\Facades\Route;
use PhpParser\NodeVisitor\CommentAnnotatingVisitor;

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

    Route::get('/kata/live/{id_combate}', [KataPanelcontrol::class, 'live'])->name('kata.live');

    Route::get('/kumite/scoreboard/{id_combate}', [KumitePanelcontrol::class, 'index'])->name('kumite.scoreboard');

    Route::get('/kumite/live/{id_combate}', [KumitePanelcontrol::class, 'live'])->name('kumite.live');

    Route::get('/api', function () {
        $dato = combate::find(48);
        $datos = $dato->with(['tatami', 'ronda', 'competencia.categoria', 'equiposkata'])->get()->first();
        return  $dato->equiposkata;
    })->name('api');

    Route::get('/tabla-participantes', function () {
        return view('tabla-participantes');
    })->name('tabla-participantes');

    Route::get('/competencia/{id_evento}', [ControllersEvento::class, 'index'])->name('eventos.index');

    Route::get('/competencia/{id_evento}/{id_competencia}', [ControllersEvento::class, 'grupos'])->name('eventos.grupos');
    

    Route::get('/evento', function () {
        return view('evento');
    })->name('evento');

});

Route::get('/competencia-home', function () {
    return view('competencia-home');
})->name('competencia-home');

require __DIR__.'/auth.php';

require __DIR__.'/arbitros.php';
