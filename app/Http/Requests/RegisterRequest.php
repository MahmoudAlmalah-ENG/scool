<?php

namespace App\Http\Requests;

use App\Enum\UserEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'phone' => ['required'],
            'email' => ['required', 'email', 'max:254', Rule::unique('users', 'email')],
            'address' => ['nullable'],
            'school' => ['nullable'],
            'invitation_code' => ['nullable', Rule::exists('invite_codes', 'code')],
            'birthday' => ['nullable', 'date'],
            'gender' => ['required', Rule::in(UserEnum::toArrayGender())],
            'password' => ['required', 'min:8', 'confirmed'],
        ];
    }
}
