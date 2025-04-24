<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // сделать норм авторизацию
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
            'content' => ['required', 'string', 'min:1', 'max:200']
        ];

        switch($this->getMethod())
        {
            case 'POST':
                return $rules;
            case 'PATCH':
                return [
                    'id' => ['required', 'integer', 'unique:categories,id']
                ] + $rules;
            case 'DELETE':
                return [
                    'id' => ['required', 'integer', 'unique:categories,id']
                ];
        }
    }
}
