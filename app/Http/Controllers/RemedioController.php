<?php

namespace App\Http\Controllers;

use App\Models\Remedio;
use App\Models\Categoria;
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
        return view('remedios', compact('remedios'));
    }

    public function create()
    {
        $categorias = Categoria::where('tipo', 'remedio')->get();
        return view('remedio_create', compact('categorias'));
    }

    public function store(RemedioRequest $request)
    {
        // dd($request->all());

        $dados = $request->validated();
        $dados['validade'] = Carbon::createFromFormat('d/m/Y', $dados['validade'])->format('Y-m-d');

        $created = $this->remedio->create($dados);

        return redirect()->back()->with('message', $created ? 'Adicionado com sucesso!' : 'Ops! Algo deu errado');
    }

    public function edit(Remedio $remedio)
    {
        $categorias = Categoria::where('tipo', 'remedio')->get();
        return view('remedio_edit', compact('remedio', 'categorias'));
    }

    public function update(RemedioRequest $request, Remedio $remedio)
    {
        $dados = $request->validated();
        $dados['validade'] = Carbon::createFromFormat('d/m/Y', $dados['validade'])->format('Y-m-d');

        $updated = $remedio->update($dados);

        return redirect()->back()->with('message', $updated ? 'Atualizado com sucesso!' : 'Ops! Algo deu errado');
    }

    public function destroy(string $id)
    {
        $this->remedio->destroy($id);
        return redirect()->route('remedios')->with('message', 'Excluído com sucesso!');
    }
}
