<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\KategoriBeritaController;

Route::get('/', function () {
    return view('pages.dashboard.dashboard');
});

Route::get('/profil', [ProfilDesaController::class, 'index']);

Route::get('/auth', [AuthController::class, 'index'])->name('login.form');

Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('galeri', GaleriController::class);

Route::resource('warga', WargaController::class);

Route::resource('user', UserController::class);

Route::resource('about', AboutController::class);

Route::resource('berita', BeritaController::class);

Route::resource('kategori', KategoriBeritaController::class);

// Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

// Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
