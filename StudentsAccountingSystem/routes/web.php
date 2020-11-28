<?php

use App\Http\Controllers\MajorsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'Hello, MDKP! Test CI/CD';
});

Route::get('/majors', [MajorsController::class, 'indexPage'])->name('majors.index');
Route::get('/majors/create', [MajorsController::class, 'createPage'])->name('majors.create');
Route::post('/majors/create', [MajorsController::class, 'createFromForm'])->name('majors.createFromForm');
