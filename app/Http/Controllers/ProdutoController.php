<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\ProdutoRequest;


class ProdutoController extends Controller
{
    public readonly Produto $produto;

    public function __construct()
    {
        $this->produto = new Produto();
    }

    public function index()
    {
        $produtos = $this->produto->all();
        return view('produtos', ['produtos' => $produtos]);   
    }

    public function create()
    {
        return view('produto_create');    
    }

    public function store(ProdutoRequest $request)
    {
        $dataFormatada = Carbon::createFromFormat('d/m/Y', $request->validade)->format('Y-m-d');
        $created = $this->produto->create([
            'nome' => $request->input('nome'),
            'id_categoria' => $request->input('id_categoria'),
            'quantidade' => $request->input('quantidade'),
            'valor' => $request->input('valor'),
            'validade' => $dataFormatada,
        ]);
        if($created){
            return redirect()->back()->with('message', 'Adicionado com sucesso!');
        }

        return redirect()->back()->with('message', 'Ops!Algo deu errado');
    }

    public function show(string $id)
    {
        //return view('produtos', ['produto' => $produto]);
    }

    public function edit(Produto $produto)
    {
        return view('produto_edit', ['produto' => $produto]);
    }

    public function update(ProdutoRequest $request, string $id)
    {
        $dataFormatada = Carbon::createFromFormat('d/m/Y', $request->validade)->format('Y-m-d');

        $dados = $request->except(['_token', '_method']);
        $dados['validade'] = $dataFormatada;

        $updated = $this->produto->where('id', $id)->update($dados);
        if($updated){
            return redirect()->back()->with('message', 'Atualizado com sucesso!');
        }

        return redirect()->back()->with('message', 'Ops!Algo deu errado');

    }   

    public function destroy(string $id)
    {
        $this->produto->where('id', $id)->delete();

        return redirect()->route('produtos')->with('message', 'Excluído com sucesso!');
    }
}
