<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGroup extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'academic_year_id' => 'required',
            'grade' => 'required',
            'major_id' => 'required',
            'pattern_id' => 'required'
        ];
    }
}
