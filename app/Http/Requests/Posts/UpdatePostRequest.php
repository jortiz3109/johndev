<?php

namespace App\Http\Requests\Posts;

use Illuminate\Validation\Rule;

class UpdatePostRequest extends StorePostRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return array_replace(parent::rules(), [
            'title' => ['required', 'min:5', 'max:120', Rule::unique('posts')->ignore($this->route('post'))],
        ]);
    }
}
