<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   dd('get all majors');
});

Route::get('/{id}', function ($id) {
    dd('get major with id: ' . $id);
});

Route::post('/', function () {
    dd('create majors');
});

Route::put('/{id}', function ($id) {
    dd('update major with id: ' . $id);
});

Route::delete('/{id}', function ($id) {
    dd('delete major with id: ' . $id);
});

