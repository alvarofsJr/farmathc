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
            'nome'         => ['required', 'string', 'min:3', 'max:100'],
            'categoria_id' => ['required', 'exists:categorias,id'],
            'quantidade'   => ['required', 'integer', 'min:0'],
            'valor' => 'required|numeric|min:0.01',
            'validade'     => ['required', 'regex:/^\d{2}\/\d{2}\/\d{4}$/', 'date_format:d/m/Y'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'         => 'O nome do produto é obrigatório.',
            'nome.min'              => 'O nome deve ter no mínimo :min caracteres.',
            'nome.max'              => 'O nome deve ter no máximo :max caracteres.',
            'categoria_id.required' => 'Selecione uma categoria.',
            'categoria_id.exists'   => 'A categoria selecionada não é válida.',
            'quantidade.required'   => 'Informe a quantidade.',
            'quantidade.integer'    => 'A quantidade deve ser um número inteiro.',
            'quantidade.min'        => 'A quantidade não pode ser negativa.',
            'valor.required'        => 'Informe o valor do produto.',
            'valor.numeric'         => 'O valor deve ser numérico.',
            'valor.min'             => 'O valor não pode ser negativo.',
            'validade.required'     => 'Informe a data de validade.',
            'validade.date_format'  => 'A validade deve estar no formato DD/MM/AAAA.',
        ];
    }
}
