<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   dd('get all years');
});

Route::get('/{id}', function ($id) {
    dd('get year with id: ' . $id);
});

Route::post('/', function () {
    dd('create year');
});

Route::delete('/{id}', function ($id) {
    dd('delete year with id: ' . $id);
});
