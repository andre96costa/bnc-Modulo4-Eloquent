<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:100',
            'short_description' => 'required',
            'price' => 'required|digits_between:1,6',
            'cod' => 'required|max:8'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'name.max' => 'O nome só pode ter até 100 caracteres.',
            'min' => 'O nome deve ter no minumo 3 caracteres.',
            'digits_between' => 'O preço precisa ter entre 1 e 6 digitos.',
            'cod.max' => 'O codigo só pode ter até 8 caracteres.',
        ];
    }
}
