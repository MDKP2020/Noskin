<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\GroupsToYear;
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
        if (empty($request['group_id']) || empty($request['select']) || empty($request['year_id'])) {
            return response()->json(["data" => "fail"]);
        }
        $groupId = $request['group_id'];
        $yearId = $request['year_id'];
        $currentYear = AcademicYear::where('id', $yearId)->first();
        $nextYear = AcademicYear::where('start_year', $currentYear->start_year + 1)->firstOrCreate(['start_year' => $currentYear->start_year + 1]);
        $nextYear->save();

        $currentGroup = GroupsToYear::where('group_id', $groupId)->where('year_id', $yearId)->first();
        $nextGroup = GroupsToYear::where('group_id', $groupId)->where('year_id', $nextYear->id)->firstOrCreate([
                "group_id" => $groupId,
                "year_id" => $nextYear->id,
                "grade" => $currentGroup->grade + 1,
                "expel_reason_id" => 1
            ]
        );
        $nextGroup->save();

        foreach ($request['select'] as $student_id) {
            $startDate = Utils::createFirstDateFromId($yearId);
            $student = StudentToGroup::where('group_id', $groupId)->where('student_id', $student_id)->where('start_date', $startDate)->first();
            $student->next_group = $groupId;
            $student->end_date = Utils::createLastDate($currentYear);

            $newStudent = new StudentToGroup;
            $newStudent->start_date = Utils::createFirstDate($nextYear);
            $newStudent->group_id = $groupId;
            $newStudent->student_id = $student->student_id;

            $student->save();
            $newStudent->save();
        }

        return response()->json(["data" => "transfer success"]);
    }
}
