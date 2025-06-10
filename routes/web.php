<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\VendaController;

Route::resource('vendas', VendaController::class);
Route::resource('carros', CarroController::class);
Route::resource('compras', CompraController::class);
Route::resource('vendedores', VendedorController::class);
Route::resource('clientes', ClienteController::class);

Route::get('/', function () {
    return view('welcome');
});
