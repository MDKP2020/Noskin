<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorsController extends Controller
{
    public function getAll() {
        return Major::all();
    }

    public function getOne(int $id) {
        return Major::find($id);
    }

    public function add(Request $request) {
        $major = new Major;
        $major->code = $request->code;
        $major->name = $request->name;
        $major->save();
    }

    public function update(Request $request) {
        $major = Major::find($request->id);
        $major->code = $request->code;
        $major->name = $request->name;
        $major->save();
    }

    public function delete(int $id) {
        Major::find($id)->delete();
    }
}
