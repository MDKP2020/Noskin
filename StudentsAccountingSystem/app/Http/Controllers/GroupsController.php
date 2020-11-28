<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupsToYear;
use App\Models\Major;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function indexPage(Request $request) {
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

    public function createPage() {
        return view('groups.create');
    }

    public function getAll() {
        return Group::with('pattern')
            ->with('students')
            ->with('years')
            ->get()
            ->append('grade');
    }
}
