<?php

namespace App\Http\Controllers;

use App\Models\GroupPattern;
use Illuminate\Http\Request;

class PatternsController extends Controller
{
    public function indexPage() {
        $patterns = GroupPattern::with('major')->get();
        return view('patterns.index', compact('patterns'));
    }

    public function createPage() {
        return view('patterns.create');
    }

    public function deleteById(int $id) {
        GroupPattern::find($id)->delete();
    }

    public function deleteAndRedirect(int $id) {
        $this->deleteById($id);
        return redirect()->back();
    }
}
