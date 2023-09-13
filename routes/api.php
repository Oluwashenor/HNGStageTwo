<?php

use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/person', [PersonController::class, 'create']);
Route::get('/person/{name}', [PersonController::class, 'show']);
Route::put('/person/{id}', [PersonController::class, 'edit']);
Route::delete('/person/{id}', [PersonController::class, 'destroy']);
