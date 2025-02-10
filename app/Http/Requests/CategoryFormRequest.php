<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
{
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
    public function rules()
    {
        return [
            'name' => 
            [
                'required|string|max:255'
            ],
            'description' =>
            [
                'nullable|string'
            ],
            'image' =>
            [
                'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ],
            'status' =>
            [
                'required|integer|between:0,1'
            ],
            'meta_title' =>
            [
                'nullable|string|max:255'
            ],
            'meta_description' =>
            [
                'nullable|string|max:255'
            ],
            'meta_keywords' =>
            [
                'nullable|string|max:255'
            ]
        ]; 
    }
}
