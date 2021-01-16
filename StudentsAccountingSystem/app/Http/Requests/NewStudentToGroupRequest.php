<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewStudentToGroupRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "first_name" => "required|max:255|min:1",
            "second_name" => "required|max:255|min:1",
            "patronymic" => "nullable",
            "student_number" => "required|max:20|min:1|unique:students"
        ];
    }

    public function messages()
    {
        return [
            "first_name.required" => Constants::$THIS_FIELD_REQUIRED_MESSAGE,
            "second_name.required" => Constants::$THIS_FIELD_REQUIRED_MESSAGE,
            "student_number.required" => Constants::$THIS_FIELD_REQUIRED_MESSAGE,
            "first_name.min" => Constants::min_length(1),
            "second_name.min" => Constants::min_length(1),
            "first_name.max" => Constants::max_length(255),
            "second_name.max" => Constants::max_length(255),
            "patronymic.max" => Constants::max_length(255),
            "student_number.min" => Constants::min_length(1),
            "student_number.max" => Constants::max_length(255),
            "student_number.unique" => Constants::unique()
        ];
    }
}
