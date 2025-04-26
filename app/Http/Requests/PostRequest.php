<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // make normal auth
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => ['required', 'string', 'min:3', 'max:100'],
            'image' => ['nullable', 'image'],
            'content' => ['required', 'string', 'min:3', 'max:255']
        ];

        switch($this->getMethod())
        {
            case 'POST':
                return $rules;
            case 'PATCH':
                return [
                    'id' => ['required', 'integer', 'unique:posts,id']
                ] + $rules;
            case 'DELETE':
                return [
                    'id' => ['required', 'integer', 'unique:posts,id']
                ];
        }
    }
}
