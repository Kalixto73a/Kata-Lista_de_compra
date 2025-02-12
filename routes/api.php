<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ListaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/lista', [ListaController::class, 'index']);
Route::post('/lista', [ListaController::class, 'store']);
Route::put('/lista/{id}', [ListaController::class, 'update']);
Route::delete('/clearlista', [ListaController::class, 'destroyAll']);
Route::delete('/lista/{id}', [ListaController::class, 'destroy']);
