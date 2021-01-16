<?php

namespace App\Http\Controllers;

use App\Models\StudentToGroup;
use Illuminate\Http\Request;

class GroupsControllerApi extends Controller
{
    public function expelStudents(Request $request)
    {
        if (empty($request['select']) || empty($request['group_id']) || empty($request['expel_reason_id']) || empty($request['year_id'])) {
            return response()->json(["data" => "fail"]);
        }

        $groupId = $request['group_id'];
        $yearId = $request['year_id'];
        foreach ($request['select'] as $item) {
            $startDate = Utils::createFirstDateFromId($yearId);
            $stg = StudentToGroup::where('group_id', $groupId)->where('student_id', $item)->where('start_date', $startDate)->first();
            $currentYear = AcademicYear::where('id', $yearId)->first();
            $stg->end_date = Utils::createLastDate($currentYear);
            $stg->expel_reason_id = $request['expel_reason_id'];
            $stg->save();
        }
        return response()->json(["data" => "expel success"]);
    }

    public function transferStudents(Request $request)
    {
        if (!empty($request['select'])) {
            return response()->json(["data" => "transfer success"]);
        }
        return response()->json(["data" => "fail"]);

    }
}
