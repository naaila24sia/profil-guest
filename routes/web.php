<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilDesaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil', [ProfilDesaController::class, 'index']);

Route::get('/auth', [AuthController::class, 'index'])->name('login.form');

Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
