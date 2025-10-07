<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilDesaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil', [ProfilDesaController::class, 'index']);

Route::get('/auth', [AuthController::class, 'index'])->name('login.form');

Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');
