<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'nome' => [
                'required',
                'min:3',
                'max:45',
            ],
            'quantidade' => [
                'required',
                'min:1',
                'max:5',
            ],
            'id_categoria' => [
                'required',
            ],
            'valor' => [
                'required',
                'min:1',
                'max:8',
            ],
            'validade' => [
                'required',
                'date_format:d/m/Y',

            ],
        ];
    }
}
