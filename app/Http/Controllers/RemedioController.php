<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Remedio;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\RemedioRequest;

class RemedioController extends Controller
{
    public readonly Remedio $remedio;

    public function __construct()
    {
        $this->remedio = new Remedio();
    }

    public function index()
    {
        $remedios = $this->remedio->with('categoria')->get();
        return view('remedios', ['remedios' => $remedios]);
    }

    public function create()
    {
        $categorias = Categoria::where('tipo', 'remedio')->get();
        return view('remedio_create', compact('categorias'));
    }

    public function store(RemedioRequest $request)
    {
        $dataFormatada = Carbon::createFromFormat('d/m/Y', $request->validade)->format('Y-m-d');

        $created = $this->remedio->create([
            'nome' => $request->input('nome'),
            'id_categoria' => $request->input('id_categoria'),
            'quantidade' => $request->input('quantidade'),
            'valor' => $request->input('valor'),
            'validade' => $dataFormatada,
        ]);

        if ($created) {
            return redirect()->back()->with('message', 'Adicionado com sucesso!');
        }

        return redirect()->back()->with('message', 'Ops!Algo deu errado');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Remedio $remedio)
    {
        $categorias = Categoria::where('tipo', 'remedio')->get();
        return view('remedio_edit', compact('remedio', 'categorias'));
    }

    public function update(RemedioRequest $request, string $id)
    {
        $dataFormatada = Carbon::createFromFormat('d/m/Y', $request->validade)->format('Y-m-d');

        $dados = $request->except(['_token', '_method']);
        $dados['validade'] = $dataFormatada;

        $updated = $this->remedio->where('id', $id)->update($dados);
        if ($updated) {
            return redirect()->back()->with('message', 'Atualizado com sucesso!');
        }

        return redirect()->back()->with('message', 'Ops! Algo deu errado');
    }

    public function destroy(string $id)
    {
        $this->remedio->where('id', $id)->delete();

        return redirect()->route('remedios')->with('message', 'Excluído com sucesso!');
    }
}
