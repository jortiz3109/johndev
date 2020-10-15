<?php

namespace App\Http\Requests\Posts;

use Illuminate\Validation\Rule;

class UpdatePostRequest extends StorePostRequest
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
        return array_replace(parent::rules(), [
            'title' => ['required', 'min:5', 'max:120', Rule::unique('posts')->ignore($this->route('post'))],
        ]);
    }
}
