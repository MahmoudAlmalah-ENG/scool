<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'phone' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'address' => ['nullable'],
            'avatar' => ['nullable'],
            'school' => ['nullable'],
            'birthday' => ['nullable', 'date'],
            'gender' => ['required'],
            'password' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
