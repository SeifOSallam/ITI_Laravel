<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    protected function failedValidation($validator)
    {
        return redirect()->back()->withErrors($validator)->withInput();
    }
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
            'title' => 'unique:posts|max:20|min:3',
            'body' => 'max:150|min:10',
            'image' => 'image|mimes:png,jpg,jpeg,svg',
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
            'title.unique' => 'Title must be unique',
            'title.max' => 'Title must not exceed 20 characters',
            'body.max' => 'Body must not exceed 150 characters',
            'image.mimes' => 'Image format must be png, jpg, jpeg or svg',
            'author.required' => 'An author is required',
            'author.exists' => "This author doesn't exist",
        ];
    }
}
