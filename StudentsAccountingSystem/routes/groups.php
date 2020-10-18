<?php

use Illuminate\Support\Facades\Route;

Route::get('/{yearId}', function ($yearId) {
    dd('Page: groups for year: ' . $yearId );
});

Route::get('/{yearId}/new', function ($yearId) {
    dd('Page: create new group for year: ' . $yearId);
});

Route::get('/{yearId}/{id}', function ($yearId, $id) {
   dd('Page: groups with id: ' . $id . ' for year: ' . $yearId);
});

Route::get('/{yearId}/{id}/student/add', function ($yearId, $id) {
   dd('Page: add student to group with id: ' . $id . ' for year: ' . $yearId );
});
