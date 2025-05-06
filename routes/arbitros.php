<?php

use App\Http\Controllers\Arbitros\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Arbitros\Auth\RegisteredUserController;
use App\Http\Controllers\Arbitros\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->prefix('arbitro')->name('arbitro.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    
});

Route::middleware('auth:arbitro')->prefix('arbitro')->name('arbitro.')->group(function () {
    Route::get('/dashboard', function () {
        return view('arbitros.dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/role', [RoleController::class, 'index'])->name('role');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
