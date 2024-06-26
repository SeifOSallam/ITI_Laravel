<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{

    protected $redirectRoute = "posts.create";
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|unique:posts|min:3|max:20',
            'body' => 'required|min:10|max:150',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg',
            'author' => 'required|exists:users,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'title.unique' => 'Title must be unique',
            'title.max' => 'Title must not exceed 20 characters',
            'body.required' => 'A body is required',
            'body.max' => 'Body must not exceed 150 characters',
            'image.required' => 'An image is required',
            'image.mimes' => 'Image format must be png, jpg, jpeg or svg',
            'author.required' => 'An author is required',
            'author.exists' => "This author doesn't exist",
        ];
    }
    
}
