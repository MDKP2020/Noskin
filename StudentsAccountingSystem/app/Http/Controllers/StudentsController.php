<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentToGroup;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function deleteById(int $id)
    {
        StudentToGroup::where('student_id', $id)->delete();
        Student::destroy($id);
        return response()->json(["message" => "ok"]);
    }
}
