<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroup;
use App\Http\Requests\NewStudentToGroupRequest;
use App\Models\AcademicYear;
use App\Models\Group;
use App\Models\GroupPattern;
use App\Models\GroupsToYear;
use App\Models\Major;
use App\Models\Student;
use App\Models\StudentToGroup;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function indexPage(Request $request)
    {
        if(empty($request->get('year_id'))) {
            $current_year = date('Y');
            $current_month = date('n');
            if($current_month > 8) {
                $year_id = AcademicYear::where('start_year', '=', $current_year)->first()->id;
            } else {
                $year_id = AcademicYear::where('start_year', '=', $current_year - 1)->first()->id;
            }
            return redirect()->route('groups.index', $request->all() + ['year_id' => $year_id]);
        }
        $groups = $this->getAll($request);
        $grades = GroupsToYear::allGrades();
        $majors = Major::all();
        $academicYears = AcademicYear::all();
        return view('groups.index', compact('majors', 'groups', 'grades', 'academicYears'));
    }

    public function createFromForm(CreateGroup $request) {
        $validated = $request->validated();
        $group = new Group;
        $group->group_pattern_id = $validated['pattern_id'];
        $group->major_id = $validated['major_id'];
        $group->save();
        $groupToYears = new GroupsToYear;
        $groupToYears->group_id = $group->id;
        $groupToYears->year_id = $validated['academic_year_id'];
        $groupToYears->grade = $validated['grade'];
        $groupToYears->expel_reason_id = 1;
        $groupToYears->save();
        return redirect()->route('groups.index');
    }

    public function groupPage(int $year_id, int $id)
    {
        $group = $this->getGroup($year_id, $id);
        return view('groups.info', compact('group'));
    }

    public function newStudent(int $year_id, int $id, string $errorMessage = "") {
        $group = $this->getGroup($year_id, $id);
        return view('groups.new-students', compact('group', 'year_id', 'id', 'errorMessage'));
    }

    public function newStudentFromForm(NewStudentToGroupRequest $request)
    {
        $validated = $request->validated();

        $group_id = $request['group_id'];
        $year_id = $request['year_id'];

        $student = new Student;
        $student->first_name = $validated['first_name'];
        $student->second_name = $validated['second_name'];
        $student->patronymic = $validated['patronymic'];
        $student->student_number = $validated['student_number'];
        $student->save();

        $start_date = date('Y-m-d');

        $studentToGroup = new StudentToGroup;
        $studentToGroup->student_id = $student->id;
        $studentToGroup->group_id = $group_id;
        $studentToGroup->start_date = $start_date;
        $studentToGroup->save();

        return redirect()->route('groups.info', [$year_id, $group_id]);
    }

    public function createPage()
    {
        $academicYears = AcademicYear::all();
        $grades = [1, 2, 3, 4, 5, 6];
        $majors = Major::all();
        $patterns = GroupPattern::all();
        return view('groups.create', compact('academicYears', 'grades', 'majors', 'patterns'));
    }

    public function getGroup(int $year_id, int $id)
    {
        return GroupsToYear::with('group.students')
            ->where('year_id', '=', $year_id)
            ->where('group_id', '=', $id)
            ->first();
    }

    public function getAll(Request $request)
    {
        return GroupsToYear::filter($request->all())->with('group.students')->get();
    }
}
