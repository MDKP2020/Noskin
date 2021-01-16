<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function deleteById(int $id) {
        Student::destroy($id);
        return response()->json(["message" => "ok"]);
    }
}
