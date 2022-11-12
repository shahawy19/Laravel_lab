<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:posts|min:3',
            'description' => 'required|min:10',
            'post_creator'=> 'required|exists:users,id'
        ];
    }
    public function messages()
    {
        return [
               'title.required' => 'Title is required',
                'title.min' => 'Title should be at least 3 characters'
        ];
    }
}
