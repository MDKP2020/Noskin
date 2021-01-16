<?php

use App\Http\Controllers\ExpelReasonsController;
use Illuminate\Support\Facades\Route;

Route::delete('/{id}', [ExpelReasonsController::class, 'deleteById']);

Route::post('/delete/{id}', [ExpelReasonsController::class, 'deleteAndRedirect'])->name('reasons.api.delete.redirect');
