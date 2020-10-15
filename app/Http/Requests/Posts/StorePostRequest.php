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
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'     => ['required', 'min:5', 'max:120', Rule::unique('posts')],
            'summary'   => ['required', 'min:20', 'max:254'],
            'body'      => ['required'],
            'published' => ['sometimes', 'boolean'],
            'featured'  => ['sometimes', 'boolean'],
        ];
    }
}
