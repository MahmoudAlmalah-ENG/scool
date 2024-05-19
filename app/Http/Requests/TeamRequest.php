<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'icon' => ['required'],
            'description' => ['required'],
            'status' => ['boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
