<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupsControllerApi extends Controller
{
    public function expelStudents(Request $request) {
        if(!empty($request['select'])) {
            return response()->json(["data" => "expel success"]);
        }
        return response()->json(["data" => "fail"]);
    }

    public function transferStudents(Request $request) {
        if(!empty($request['select'])) {
            if(!empty($request['select'])) {
                return response()->json(["data" => "transfer success"]);
            }
            return response()->json(["data" => "fail"]);
        }
    }
}
