<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'firstname' => 'required|string|min:2|max:255',
            'lastname'  => 'required|string|min:2|max:255',
            'surname'   => 'required|string|min:2|max:255',
            'birthday'  => 'required|date|before:now',
            'group_id'  => 'nullable|uuid|exists:groups,id'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
