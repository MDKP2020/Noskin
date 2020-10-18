<?php

use Illuminate\Support\Facades\Route;

Route::get('', function () {
    dd('PAGE: students');
});

Route::get('/{id}', function ($id) {
   dd('PAGE: student with id ' . $id);
});

