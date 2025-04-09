<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use App\Http\Requests\FornecedorRequest;

class FornecedorController extends Controller
{
    public readonly Fornecedor $fornecedor;

    public function __construct()
    {
        $this->fornecedor = new Fornecedor();
    }

    public function index()
    {
        $fornecedors = $this->fornecedor->all();
        return view('fornecedors', compact('fornecedors'));
    }

    public function create()
    {
        return view('fornecedor_create');
    }

    public function store(FornecedorRequest $request)
    {
        $cnpjSemFormatacao = preg_replace('/\D/', '', $request->cnpj);

        $created = $this->fornecedor->create([
            'nome_fantasia' => $request->input('nome_fantasia'),
            'email' => trim($request->input('email')),
            'cnpj' => $cnpjSemFormatacao,
        ]);

        return redirect()->route('fornecedors')
            ->with('message', $created ? 'Fornecedor adicionado com sucesso!' : 'Ops! Algo deu errado');
    }

    public function show(string $id)
    {
        // Implementar se necessário
    }

    public function edit(Fornecedor $fornecedor)
    {
        return view('fornecedor_edit', compact('fornecedor'));
    }

    public function update(FornecedorRequest $request, string $id)
    {
        $cnpjSemFormatacao = preg_replace('/\D/', '', $request->cnpj);

        $dados = $request->except(['_token', '_method']);
        $dados['cnpj'] = $cnpjSemFormatacao;

        $updated = $this->fornecedor->where('id', $id)->update($dados);

        return redirect()->route('fornecedors')
            ->with('message', $updated ? 'Fornecedor atualizado com sucesso!' : 'Ops! Algo deu errado');
    }

    public function destroy(string $id)
    {
        $this->fornecedor->where('id', $id)->delete();

        return redirect()->route('fornecedors')
            ->with('message', 'Fornecedor excluído com sucesso!');
    }
}
