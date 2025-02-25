<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SingerController;

// Ruta principal para cargar la vista de la aplicación
Route::get('/', function () {
    return view('index');
})->name('home');

// Agrupar rutas de la API con el prefijo "api"
Route::prefix('api')->group(function () {
    // Rutas para álbumes (CRUD completo)
    Route::apiResource('albums', AlbumController::class);
    
    // Rutas para cantantes (solo listar y crear)
    Route::apiResource('singers', SingerController::class)->only(['index', 'store']);
});