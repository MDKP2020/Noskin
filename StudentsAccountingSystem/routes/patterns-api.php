<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (){
   dd('get all patterns');
});

Route::get('/{id}', function ($id) {
   dd('get pattern with id: ' . $id);
});

Route::get('/major/{majorId}', function ($majorId) {
   dd('get patterns for major id: ' . $majorId);
});

Route::post('/major/{majorId}', function ($majorId) {
    dd('create pattern for major id: ' . $majorId);
});

Route::put('/{id}', function ($id) {
    dd('update pattern with id: ' . $id);
});

Route::delete('/{id}', function ($id) {
    dd('delete pattern with id: ' . $id);
});
