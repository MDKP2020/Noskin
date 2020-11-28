<?php

namespace App\Http\Controllers;

use App\Models\Group;
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
            ->append('grade');
        $grades = GroupsToYear::allGrades();
        $majors = Major::all();
        return view('groups.index', compact('majors', 'groups', 'grades'));
    }

    public function groupPage(int $id)
    {
        $group = $this->getGroup($id);
        return view('groups.info', compact('group'));
    }


    public function createPage()
    {
        return view('groups.create');
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
