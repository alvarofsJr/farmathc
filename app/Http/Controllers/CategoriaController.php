<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('categoria', compact('categorias'));
    }

    public function create()
    {
        return view('categoria_create');
    }

    public function store(CategoriaRequest $request)
    {
        $created = Categoria::create($request->validated());

        return redirect()->route('categorias.index')
            ->with('message', $created ? 'Categoria adicionada com sucesso!' : 'Ops! Algo deu errado');
    }

    public function show(Categoria $categoria)
    {
        return view('categoria_show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categoria_edit', compact('categoria'));
    }

    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        $updated = $categoria->update($request->validated());

        return redirect()->route('categorias.index')
            ->with('message', $updated ? 'Categoria atualizada com sucesso!' : 'Ops! Algo deu errado');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')
            ->with('message', 'Categoria removida com sucesso!');
    }
}


