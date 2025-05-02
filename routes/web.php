<?php

use App\Http\Controllers\CombatesController;
use App\Http\Controllers\ProfileController;
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

    Route::get('/prueba', function () {
       
        
        return view('PanelKata');
    });

    Route::get('/prueba/live', function () {
       
        return view('Katalive');
    });

    // Route::get('/api', function () {
    //     CombatesController::EmparejarKata(1, 1, 2);
    //     $kata=CombatesController::CrearJueces(1);
    //     return $kata;
    // })->name('api');

    Route::get('/tabla-participantes', function () {
        return view('tabla-participantes');
    })->name('tabla-participantes');
});

require __DIR__ . '/auth.php';
