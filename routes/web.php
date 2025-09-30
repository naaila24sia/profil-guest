<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilDesaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil', [ProfilDesaController::class, 'index']);
