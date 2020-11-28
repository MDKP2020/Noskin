<?php

use Illuminate\Support\Facades\Route;

Route::get('/{yearId}', function ($yearId) {
//    dd('Page: groups for year: ' . $yearId );

    $data = [];
    /*
        в data нужны:
        - текущий yearId
        - список уч лет (id, value)
        - список направлений (id, value)
        - список курсов (id, value)
        - список групп за уч год (id, name, status)
    */

    return view('groups')->with('data', $data);
});

Route::get('/{yearId}/new', function ($yearId) {
//    dd('Page: create new group for year: ' . $yearId);
    $data = [];
    /*
        - текущий yearId
        - список уч лет (id, value)
        - список направлений (id, value)
        - список курсов (id, value)
        - список шаблонов названий (?)
     */
    return view('new-group')->with($data);
});

Route::get('/{yearId}/{id}', function ($yearId, $id) {
//   dd('Page: groups with id: ' . $id . ' for year: ' . $yearId);
    $data = [];
    /*
        - текущий yearId
        - текущий groupId
        - список уч лет (id, value)
        - список студентов
    */
    return view('students')->with('id', $id);
});

Route::get('/{yearId}/{id}/student/add', function ($yearId, $id) {
//   dd('Page: add student to group with id: ' . $id . ' for year: ' . $yearId );
    $data = [];
    /*
        - текущий yearId
        - список уч лет (id, value)
     */
    return view('new-student')->with('id', $id);
});
