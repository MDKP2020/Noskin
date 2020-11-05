<?php

use App\Http\Controllers\MajorsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MajorsController::class, 'getAll']);

Route::get('/{id}', [MajorsController::class, 'findById']);

Route::post('/', [MajorsController::class, 'add']);

Route::put('/{id}', [MajorsController::class, 'update']);

Route::delete('/{id}', [MajorsController::class, 'delete']);

