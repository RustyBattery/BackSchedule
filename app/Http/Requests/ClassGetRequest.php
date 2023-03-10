<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassGetRequest extends FormRequest
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
            'date_start' => 'required|date',
            'group_id' => 'nullable|exists:groups,id',
            'teacher_id' => 'nullable|exists:teachers,id',
        ];
    }
}
