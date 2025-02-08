<?php

use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\Info\InfoController;
use Illuminate\Support\Facades\Route;

Route::get('/info', [InfoController::class, 'index']);

Route::get('/clientes',[ClienteController::class, 'index']);
Route::get('/clientes/{id}',[ClienteController::class, 'findById']);
Route::get('/clientes/nome/{nome}',[ClienteController::class, 'findByName']);
Route::delete('/clientes/{id}',[ClienteController::class, 'destroy']);
Route::post('/clientes',[ClienteController::class, 'upsert']);
Route::put('/clientes',[ClienteController::class, 'upsert']);
Route::get('/contarclientes',[ClienteController::class, 'contar']);



