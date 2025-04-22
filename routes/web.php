<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Models\categoria;
use App\Models\combate;
use App\Models\competencia;
use App\Models\evento;
use App\Models\participante;
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

    Route::get('/prueba', function () {
        return view('prueba');
    })->name('prueba');

    Route::get('/api', function () {
        $dato=combate::find(1);
        $datos=$dato->with(['tatami','ronda','competencia.categoria','equipokata'])->get()->first();

        return $datos;//->equipokata()->with(['participantes'])->get();
    })->name('api');
    Route::get('/live', function () {


        return view('pruebalive');
    })->name('api');
});

require __DIR__ . '/auth.php';
