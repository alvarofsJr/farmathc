<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'min:3', 'max:255'],
            'tipo' => ['required', 'in:produto,remedio'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'         => 'O nome da categoria é obrigatória.',
            'nome.min'              => 'O nome deve ter no mínimo :min caracteres.',
            'nome.max'              => 'O nome deve ter no máximo :max caracteres.',
            'categoria_id.required' => 'Selecione uma categoria.',
        ];
    }
}