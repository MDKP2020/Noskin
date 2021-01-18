<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePattern;
use App\Models\GroupPattern;
use App\Models\Major;
use Illuminate\Http\Request;

class PatternsController extends Controller
{
    public function indexPage()
    {
        $patterns = GroupPattern::with('major')->get();
        return view('patterns.index', compact('patterns'));
    }

    public function createPage()
    {
        $majors = Major::all();
        return view('patterns.create', compact('majors'));
    }

    public function createFromForm(CreatePattern $request)
    {
        $pattern = new GroupPattern;
        $pattern->pattern = $request['pattern'];
        $pattern->major_id = $request['major_id'];
        $pattern->save();
        return redirect(route('patterns.index'));
    }

    public function deleteById(int $id)
    {
        GroupPattern::find($id)->delete();
    }

    public function deleteAndRedirect(int $id)
    {
        $this->deleteById($id);
        return redirect()->back();
    }
}
