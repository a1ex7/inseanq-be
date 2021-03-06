<?php

namespace App\Http\Requests\Groups;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'number'  => 'required|string|min:2|max:255',
            'course'  => 'required|integer|min:1|max:5',
            'faculty' => 'required|string|min:2|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
