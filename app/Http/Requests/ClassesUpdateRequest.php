<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassesUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'subject_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'classroom_id' => 'required|integer',
            'data_start' => 'required|datetime',
            'data_end' => 'required|datetime',
            'period' => 'required|integer',
        ];
    }
}
