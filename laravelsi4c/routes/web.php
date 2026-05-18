<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;

Route::get('/', function () {
    return view('fakultas.create');
});

Route::resource('fakultas', FakultasController::class);

Route::resource('/periode', PeriodController::class);

Route::resource('/berita', BeritaController::class);

Route::resource('/prodi', ProdiController::class);

