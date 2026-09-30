<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Login y registro: solo para visitantes (si ya iniciaste sesión, te regresa)
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

// Solo para usuarios con sesión iniciada
Route::middleware('auth')->group(function () {
    // Confirmar contraseña: la pide el middleware 'password.confirm' antes de entrar al perfil
    Route::get('confirm-password', [ConfirmPasswordController::class, 'create'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmPasswordController::class, 'store']);

    // Cerrar sesión
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
});
