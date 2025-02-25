<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SingerController;

Route::get('/', [AlbumController::class, 'index']);

Route::resource('albums', AlbumController::class);
Route::resource('singers', SingerController::class);
