<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:100'],
            'image' => ['nullable', 'image'],
            'content' => ['required', 'string', 'min:3', 'max:255'],
            'categories' => 'array', 
            'categories.*' => 'exists:categories,id'
        ];
    }
}
