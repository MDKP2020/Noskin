<?php

namespace App\Http\Controllers;

use App\Models\StudentToGroup;
use Illuminate\Http\Request;

class GroupsControllerApi extends Controller
{
    public function expelStudents(Request $request)
    {
        if (!empty($request['select']) && !empty($request['group_id']) && !empty($request['expel_reason_id'])) {
            $groupId = $request['group_id'];
            foreach ($request['select'] as $item) {
                $stg = StudentToGroup::where('group_id', $groupId)->where('student_id', $item)->first();
                $stg->end_date = date('Y-m-d');
                $stg->expel_reason_id = $request['expel_reason_id'];
                $stg->save();
            }
            return response()->json(["data" => "expel success"]);
        }
        return response()->json(["data" => "fail"]);
    }

    public function transferStudents(Request $request)
    {
        if (!empty($request['select'])) {
            return response()->json(["data" => "transfer success"]);
        }
        return response()->json(["data" => "fail"]);

    }
}
