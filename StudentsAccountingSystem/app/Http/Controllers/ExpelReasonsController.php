<?php

namespace App\Http\Controllers;

use App\Models\ExpelReasons;
use Illuminate\Http\Request;

class ExpelReasonsController extends Controller
{
    public function indexPage() {
        $reasons = ExpelReasons::all();
        return view('expel_reasons.index', compact('reasons'));
    }

    public function createPage() {
        return view('expel_reasons.create');
    }

    public function deleteById(int $id) {
        ExpelReasons::find($id)->delete();
    }

    public function deleteAndRedirect(int $id) {
        $this->deleteById($id);
        return redirect()->back();
    }
}
