<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/api/veiculos', [App\Http\Controllers\HomeController::class, 'getAllveiculos'])->name('getAllveiculos');

Route::get('/api/veiculo/{id}', [App\Http\Controllers\HomeController::class, 'getVeiculo'])->name('getVeiculo');

Route::post('/api/simulacao/', [App\Http\Controllers\HomeController::class, 'simulacaoValores'])->name('simulacaoValores');
