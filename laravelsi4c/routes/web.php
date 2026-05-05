<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('fakultas', FakultasController::class);

Route::resource('/periode', PeriodController::class);

Route::resource('/berita', BeritaController::class);

Route::get('/prodi', [ProdiController::class, 'index']);