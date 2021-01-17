<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateMajor extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|min:1|unique:majors',
            'code' => 'required|string|max:255|min:1|unique:majors'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => Constants::$THIS_FIELD_REQUIRED_MESSAGE,
            "code.required" => Constants::$THIS_FIELD_REQUIRED_MESSAGE,
            "name.min" => Constants::min_length(1),
            "code.min" => Constants::min_length(1),
            "name.max" => Constants::max_length(255),
            "code.max" => Constants::max_length(255),
        ];
    }
}
