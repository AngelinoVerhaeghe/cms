<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|unique:posts',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ];
    }

    /**
     * Get the messages/errors apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Title name is required!',
            'description.required' => 'Description area is required!',
            'content.required' => 'Content area is required!',
            'category_id.required' => 'Select category for this post!'
        ];
    }
}
