<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\PeriodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('fakultas', FakultasController::class);

Route::resource('/periode', PeriodController::class);