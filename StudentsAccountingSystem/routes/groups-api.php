<?php

use App\Http\Controllers\GroupsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GroupsController::class, 'getAll']);

Route::get('/{yearId}', function ($yearId) {
    dd('all groups for year: ' . $yearId);
});

Route::get('/{yearId}/major/{majorId}', function ($yearId, $majorId) {
    dd('all groups for year: ' . $yearId . ' for major: ' . $majorId);
});

Route::get('/{yearId}/id/{majorId}', function ($yearId, $id) {
    dd('group for year: ' . $yearId . ' for id: ' . $id);
});

Route::post('/{yearId}', function ($yearId) {
    dd('Create group for year: ' . $yearId);
});

Route::put('/{yearId}/{id}/nextGrade', function ($yearId, $id) {
    dd('Transfer group with id: ' . $id . ' for year: ' . $yearId);
});

Route::put('/{yearId}/{id}', function ($yearId, $id) {
    dd('Update group with id: ' . $id . ' for year: ' . $yearId);
});

Route::delete('/{yearId}/{id}', function ($yearId, $id) {
    dd('Delete group with id: ' . $id . ' for year: ' . $yearId);
});
