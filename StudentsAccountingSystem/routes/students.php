<?php

use Illuminate\Support\Facades\Route;

Route::get('', function () {
//    dd('PAGE: students');
    $data = [];
    return view('students.students-archive')->with('data', $data);
});

Route::get('/{id}', function ($id) {
//   dd('PAGE: student with id ' . $id);
    $data = [];
    return view('students.student')->with('data', $data);
});

