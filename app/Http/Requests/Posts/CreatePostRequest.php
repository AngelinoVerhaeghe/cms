<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'published_at' => 'required',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:5048',
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
            'image.required' => 'Image needs to be uploaded!',
            'published_at.required' => 'Add a date for this post!',
            'category_id.required' => 'Select category for this post!'
        ];
    }

}
