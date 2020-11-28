<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Major;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function indexPage(Request $request) {
//        ddd($this->getAll()->toArray());
        $groups = Group::filter($request->all())->get();
        $majors = Major::all();
        return view('groups.index', compact('majors', 'groups'));
    }

    public function createPage() {
        return view('groups.create');
    }

    public function getAll() {
        return Group::with('pattern')
            ->with('students')
            ->get();
    }
}
