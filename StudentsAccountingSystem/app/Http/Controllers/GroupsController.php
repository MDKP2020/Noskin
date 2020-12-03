<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroup;
use App\Models\AcademicYear;
use App\Models\Group;
use App\Models\GroupPattern;
use App\Models\GroupsToYear;
use App\Models\Major;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function indexPage(Request $request)
    {
        $groups = Group::filter($request->all())
            ->with('pattern')
            ->with('students')
            ->with('years')
            ->get()
            ->append('grade')
            ->append('year_id');
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

    public function groupPage(int $id)
    {
        $group = $this->getGroup($id);
        return view('groups.info', compact('group'));
    }

    public function newStudent(int $id) {
        $group = $this->getGroup($id);
        return view('groups.new-students', compact('group'));
    }

    public function createPage()
    {
        $academicYears = AcademicYear::all();
        $grades = GroupsToYear::allGrades();
        $majors = Major::all();
        $patterns = GroupPattern::all();
        return view('groups.create', compact('academicYears', 'grades', 'majors', 'patterns'));
    }

    public function getGroup(int $id)
    {
        return Group::with('pattern')
            ->with('students')
            ->with('years')
            ->find($id)
            ->append('grade');
    }

    public function getAll()
    {
        return Group::with('pattern')
            ->with('students')
            ->with('years')
            ->get()
            ->append('grade');
    }
}
