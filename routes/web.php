<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\KategoriBeritaController;

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

// Route::get('/auth', [AuthController::class, 'index'])->name('login.form');

// Halaman form login
Route::get('/auth', [AuthController::class, 'index'])->name('login.form');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard setelah login
Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware('checkislogin');

Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('galeri', GaleriController::class);

Route::resource('warga', WargaController::class);

Route::resource('user', UserController::class);

Route::resource('about', AboutController::class);

Route::resource('profil', ProfilController::class);

Route::resource('berita', BeritaController::class);

Route::resource('kategori', KategoriBeritaController::class);

Route::resource('agenda', AgendaController::class);

// Route::resource('auth', AuthController::class);

Route::post('/berita/{id}/media', [BeritaController::class, 'uploadMedia'])
    ->name('berita.media.upload');

Route::delete('/berita/media/{media}', [BeritaController::class, 'deleteMedia'])
    ->name('berita.media.delete');

Route::post('/galeri/{id}/upload', [GaleriController::class, 'uploadMedia'])
    ->name('galeri.uploadMedia');

Route::delete('/galeri/media/{media}', [GaleriController::class, 'deleteMedia'])
    ->name('galeri.deleteMedia');

Route::get('/developer', [DeveloperController::class, 'index'])
    ->name('developer');

Route::group(['middleware' => ['checkislogin']], function () {
    // List Route yang ingin diterapkan Middleware
});
Route::group(['middleware' => ['checkislogin']], function () {

    Route::group(['middleware' => ['checkrole:admin']], function () {
        Route::resource('warga', WargaController::class)->only(['edit', 'update', 'index', 'destroy', 'create', 'store']);;
        Route::resource('user', UserController::class)->only(['edit', 'update', 'index', 'destroy', 'create', 'store']);;
        Route::resource('kategori', KategoriBeritaController::class)->only(['edit', 'update', 'index', 'destroy', 'create', 'store']);;
        Route::resource('profil', ProfilController::class)->only(['edit', 'update', 'destroy', 'create', 'store']);;
        Route::resource('agenda', AgendaController::class)->only(['edit', 'update', 'destroy', 'create', 'store']);;
        Route::resource('profil', ProfilController::class)->only(['edit', 'update', 'destroy', 'create', 'store']);;
        Route::resource('galeri', GaleriController::class)->only(['edit', 'update', 'destroy', 'create', 'store', 'deleteMedia']);;
        Route::resource('berita', BeritaController::class)->only(['edit', 'update', 'destroy', 'create', 'store']);;
    });

});
