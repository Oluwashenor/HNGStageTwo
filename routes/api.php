<?php

use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/', [PersonController::class, 'create']);
Route::get('/{id}', [PersonController::class, 'show']);
Route::put('/{parameter}', [PersonController::class, 'edit']);
Route::delete('/{id}', [PersonController::class, 'destroy']);
