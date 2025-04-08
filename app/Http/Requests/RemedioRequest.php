<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RemedioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => ['required', 'min:3', 'max:45'],
            'quantidade' => ['required', 'integer', 'min:1'],
            'id_categoria' => ['required', 'exists:categorias,id'],
            'valor' => ['required', 'numeric', 'min:0.01'],
            'validade' => ['required', 'date_format:d/m/Y'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.min' => 'O nome deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O nome deve ter no máximo 45 caracteres.',

            'quantidade.required' => 'A quantidade é obrigatória.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'quantidade.min' => 'A quantidade deve ser no mínimo 1.',

            'id_categoria.required' => 'A categoria é obrigatória.',
            'id_categoria.exists' => 'A categoria selecionada é inválida.',

            'valor.required' => 'O valor é obrigatório.',
            'valor.numeric' => 'O valor deve ser um número.',
            'valor.min' => 'O valor deve ser maior que zero.',

            'validade.required' => 'A validade é obrigatória.',
            'validade.date_format' => 'A validade deve estar no formato dd/mm/aaaa.',
        ];
    }
}
