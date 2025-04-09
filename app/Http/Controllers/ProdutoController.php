<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Categoria;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('categoria')->orderBy('nome')->get();
        return view('produtos', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::where('tipo', 'produto')->orderBy('nome')->get();
        return view('produto_create', compact('categorias'));
    }

    public function store(ProdutoRequest $request)
    {
        $created = Produto::create($request->validated());

        return redirect()->route('produtos.index')
            ->with('message', $created ? 'Produto adicionado com sucesso!' : 'Ops! Algo deu errado');
    }

    public function show(Produto $produto)
    {
        return view('produto_show', compact('produto'));
    }

    public function edit(Produto $produto)
    {
        $categorias = Categoria::where('tipo', 'produto')->orderBy('nome')->get();
        return view('produto_edit', compact('produto', 'categorias'));
    }

    public function update(ProdutoRequest $request, Produto $produto)
    {
        $updated = $produto->update($request->validated());

        return redirect()->route('produtos.index')
            ->with('message', $updated ? 'Produto atualizado com sucesso!' : 'Ops! Algo deu errado');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')
            ->with('message', 'Produto removido com sucesso!');
    }
}
