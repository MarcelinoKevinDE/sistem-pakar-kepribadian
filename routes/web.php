<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesKepribadianController;

Route::get('/', function () {
    return redirect()->route('tes.index');
});

Route::get('/tes-kepribadian', [TesKepribadianController::class, 'index'])
    ->name('tes.index');

Route::post('/tes-kepribadian/proses', [TesKepribadianController::class, 'proses'])
    ->name('tes.proses');