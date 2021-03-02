<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'     => ['required', 'min:5', 'max:120', Rule::unique('posts')],
            'summary'   => ['required', 'string', 'min:10', 'max:100'],
            'body'      => ['required', 'filled'],
            'published' => ['filled'],
            'featured'  => ['filled']
        ];
    }
}
