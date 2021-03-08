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
            'name' => ['required','string','min:10','max:200'],
            'email' => ['required','email:rfc'],
            'avatar' => [
                'filled',
                'image',
                Rule::dimensions()->ratio(1)->maxWidth(200)
            ],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
            'about' => ['required', 'string', 'max:200'],
        ];
    }
}
