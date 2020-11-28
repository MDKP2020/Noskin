<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorsController extends Controller
{
    public function indexPage() {
        return view('majors.index');
    }

    public function getAll() {
        return Major::all();
    }

    public function findById(int $id) {
        $major = Major::find($id);
        if ($major == null)
            return self::responseForError("There's no major with such id");
        return $major;
    }

    public function create(Request $request) {
        if (self::codeExists($request->code)) {
            return self::responseForError("Major with such code already exists");
        }
        $major = new Major;
        $major->code = $request->code;
        $major->name = $request->name;
        $major->save();
    }

    public function update(Request $request) {
        $major = Major::find($request->id);
        if ($major == null)
            return self::responseForError("There's no major with such id");
        $majorWithSameCode = $this->findByCode($request->code);
        if ($majorWithSameCode != null && $majorWithSameCode->id != $request->id)
            return self::responseForError("Major with such code already exists");

        $major->code = $request->code;
        $major->name = $request->name;
        $major->save();
    }

    public function findByCode(string $code) {
        return Major::where("code", '=', $code)->first();
    }

    public function delete(int $id) {
        Major::find($id)->delete();
    }

    private static function responseForError(string $errorMessage, int $status = 400) {
        return response(["errorMessage" => $errorMessage], $status);
    }

    private static function codeExists(string $code): bool {
        $model = Major::where("code", '=', $code)->first();
        return $model != null;
    }
}
