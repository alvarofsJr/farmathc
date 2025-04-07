<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => ['bail', 'required', 'string', 'min:3', 'max:45'],
            'quantidade' => ['bail', 'required', 'integer', 'min:1'],
            'id_categoria' => ['bail', 'required', 'integer', 'exists:categorias,id'],
            'valor' => ['bail', 'required', 'numeric', 'min:0.01'],
            'validade' => ['bail', 'required', 'date_format:d/m/Y'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.min' => 'O nome deve ter pelo menos :min caracteres.',
            'nome.max' => 'O nome não pode ter mais que :max caracteres.',

            'quantidade.required' => 'A quantidade é obrigatória.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'quantidade.min' => 'A quantidade deve ser no mínimo :min.',

            'id_categoria.required' => 'A categoria é obrigatória.',
            'id_categoria.integer' => 'A categoria selecionada é inválida.',
            'id_categoria.exists' => 'A categoria selecionada não existe.',

            'valor.required' => 'O valor é obrigatório.',
            'valor.numeric' => 'O valor deve ser um número.',
            'valor.min' => 'O valor deve ser maior que zero.',

            'validade.required' => 'A validade é obrigatória.',
            'validade.date_format' => 'A validade deve estar no formato dd/mm/aaaa.',
        ];
    }
}
