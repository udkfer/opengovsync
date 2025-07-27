<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    Route::get('/deputados', [DeputadoController::class, 'index'])->name('deputados.index');
    Route::get('/deputados/{deputado}', [DeputadoController::class, 'show'])->name('deputados.show');
    Route::get('/sync', [DeputadoController::class, 'sync'])->name('deputados.sync');
});
