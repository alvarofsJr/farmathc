<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria', compact('categorias'));
    }

    public function create()
    {
        return view('categoria_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|in:produto,remedio',
        ]);

        Categoria::create([
            'nome' => $request->input('nome'),
            'tipo' => $request->input('tipo'),
        ]);

        return redirect()->route('categorias.index')
            ->with('message', 'Categoria criada com sucesso!');
    }

    public function edit(Categoria $categoria)
    {
        return view('categoria_edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')
            ->with('message', 'Categoria atualizada com sucesso!');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')
            ->with('message', 'Categoria excluída com sucesso!');
    }
}
