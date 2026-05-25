<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Models\Mahasiswa;

Route::get('/', function () {
    return view('fakultas.create');
});

Route::resource('fakultas', FakultasController::class)->parameters(['fakultas' => 'fakultas']);

Route::resource('/periode', PeriodController::class);

Route::resource('/berita', BeritaController::class);

Route::resource('/prodi', ProdiController::class);

Route::resource('/mahasiswa', MahasiswaController::class);

