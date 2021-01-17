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

        self::expel($groupId, $yearId, $request['select'], $request['expel_reason_id']);

        return response()->json(["data" => "expel success"]);
    }

    public function transferStudents(Request $request)
    {
        if (empty($request['group_id']) || empty($request['select']) || empty($request['year_id'])) {
            return response()->json(["data" => "fail"]);
        }
        $groupId = $request['group_id'];
        $yearId = $request['year_id'];

        self::transfer($groupId, $yearId, $request['select']);

        return response()->json(["data" => "transfer success"]);
    }

    public function transferGroups(Request $request)
    {
        if (empty($request['select']) || empty($request['year_id'])) {
            return response()->json(["data" => "fail"]);
        }
        $yearId = $request['year_id'];

        foreach ($request['select'] as $group)
        {
            $currentGroup = GroupsToYear::where('id', $group)->first();
            $groupStudents = Utils::studentsForGroupAndYear($currentGroup);

            $studentsToTransfer = [];

            foreach ($groupStudents as $student)
            {
                if (!Utils::isTransferred($student) && !Utils::isExpelled($student))
                    array_push($studentsToTransfer, $student->student_id);
            }

            self::transfer($currentGroup->group_id, $yearId, $studentsToTransfer);
        }

        return response()->json(["data" => "transfer success"]);
    }

    public static function transfer($groupId, $yearId, $students)
    {
        $currentYear = AcademicYear::where('id', $yearId)->first();
        $nextYear = AcademicYear::where('start_year', $currentYear->start_year + 1)->firstOrCreate(['start_year' => $currentYear->start_year + 1]);
        $nextYear->save();

        $currentGroup = GroupsToYear::where('group_id', $groupId)->where('year_id', $yearId)->first();
        $nextGroup = GroupsToYear::where('group_id', $groupId)->where('year_id', $nextYear->id)->firstOrCreate([
                "group_id" => $groupId,
                "year_id" => $nextYear->id,
                "grade" => $currentGroup->grade + 1
            ]
        );
        $nextGroup->save();

        foreach ($students as $studentId) {
            $startDate = Utils::createFirstDateFromId($yearId);
            $student = StudentToGroup::where('group_id', $groupId)->where('student_id', $studentId)->where('start_date', $startDate)->first();
            $student->next_group = $groupId;
            $student->end_date = Utils::createLastDate($currentYear);

            $newStudent = new StudentToGroup;
            $newStudent->start_date = Utils::createFirstDate($nextYear);
            $newStudent->group_id = $groupId;
            $newStudent->student_id = $student->student_id;

            $student->save();
            $newStudent->save();
        }
    }

    public static function expel($groupId, $yearId, $students, $expelReasonId)
    {
        foreach ($students as $item) {
            $startDate = Utils::createFirstDateFromId($yearId);
            $stg = StudentToGroup::where('group_id', $groupId)->where('student_id', $item)->where('start_date', $startDate)->first();
            $currentYear = AcademicYear::where('id', $yearId)->first();
            $stg->end_date = Utils::createLastDate($currentYear);
            $stg->expel_reason_id = $expelReasonId;
            $stg->save();
        }
    }
}
