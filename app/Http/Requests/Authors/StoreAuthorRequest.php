<?php

namespace App\Http\Requests\Authors;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAuthorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['bail', 'required','string','min:10','max:200'],
            'email' => ['bail', 'required','email:rfc', Rule::unique('users')],
            'avatar' => [
                'filled',
                'image',
                Rule::dimensions()->ratio(1)->maxWidth(200)
            ],
            'password' => ['bail', 'required', 'min:8', 'confirmed'],
            'about' => ['bail', 'required', 'string', 'max:500'],
        ];
    }
}
