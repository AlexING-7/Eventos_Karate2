<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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

    Route::get('/tabla-participantes', function () {
        return view('tabla-participantes');
    })->name('tabla-participantes');

    Route::get('/competencia', function () {
        return view('competencia');
    })->name('competencia');

    Route::get('/evento', function () {
        return view('evento');
    })->name('evento');

});

Route::get('/competencia-home', function () {
    return view('competencia-home');
})->name('competencia-home');

require __DIR__.'/auth.php';
