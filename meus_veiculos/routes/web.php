<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculosController;

Route::get('/vue-teste', function () {
    return view('vue-teste');
 });

Route::get('/', function () {
    return view('vue-teste');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\VeiculosController::class, 'index'])->name('veiculo');
