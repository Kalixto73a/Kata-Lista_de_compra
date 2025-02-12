<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ListaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/lista', [ListaController::class, 'index'])->name('listaAll');
Route::post('/lista', [ListaController::class, 'store'])->name('crearProducto');
Route::put('/lista/{id}', [ListaController::class, 'update'])->name('actualizarProducto');
Route::delete('/clearlista', [ListaController::class, 'destroyAll'])->name('borrarTodo');
Route::delete('/lista/{id}', [ListaController::class, 'destroy'])->name('borrarProducto');
