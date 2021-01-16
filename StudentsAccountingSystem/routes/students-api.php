<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   dd('get all students');
});

Route::get('/id/history', function ($id) {
    dd('det student history with id: ' . $id);
});

Route::get('/{id}', function ($id) {
   dd('get student by id: '. $id);
});

Route::post('/', function () {
   dd('create student');
});

Route::put('/{id}/transfer', function ($id) {
   dd('transfer user with id: ' . $id);
});

Route::put('/{id}', function ($id) {
   dd('Update user with id' . $id);
});

Route::delete('/{id}',[StudentsController::class, 'deleteById'])->name('students.api.delete');
