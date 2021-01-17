<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExpelReason;
use App\Models\ExpelReasons;

class ExpelReasonsController extends Controller
{
    public function indexPage()
    {
        $reasons = ExpelReasons::all();
        return view('expel_reasons.index', compact('reasons'));
    }

    public function createPage()
    {
        return view('expel_reasons.create');
    }

    public function createFromForm(CreateExpelReason $request)
    {
        $expelReason = new ExpelReasons;
        $expelReason->reason = $request['reason'];
        $expelReason->save();
        return redirect(route('reasons.index'));
    }

    public function deleteById(int $id)
    {
        ExpelReasons::find($id)->delete();
    }

    public function deleteAndRedirect(int $id)
    {
        $this->deleteById($id);
        return redirect()->back();
    }
}
