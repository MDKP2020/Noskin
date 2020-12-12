<?php

use App\Http\Controllers\GroupsController;
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
    return redirect()->route('groups.index');
});

Route::get('/majors', [MajorsController::class, 'indexPage'])->name('majors.index');
Route::get('/majors/create', [MajorsController::class, 'createPage'])->name('majors.create');
Route::post('/majors/create', [MajorsController::class, 'createFromForm'])->name('majors.createFromForm');

Route::get('/groups', [GroupsController::class, 'indexPage'])->name('groups.index');
Route::get('/groups/create', [GroupsController::class, 'createPage'])->name('groups.create');
Route::post('/groups/create', [GroupsController::class, 'createFromForm'])->name('groups.createFromForm');

Route::get('/groups/{year}/{id}', [GroupsController::class, 'groupPage'])->name('groups.info');
Route::get('/groups/{id}/new', [GroupsController::class, 'newStudent'])->name('groups.new');
