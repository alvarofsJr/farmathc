<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Remedio;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\StoreUpdateRequest;


class RemedioController extends Controller
{
    public readonly Remedio $remedio;

    public function __construct()
    {
        $this->remedio = new Remedio();
    }

    public function index()
    {
        $remedios = $this->remedio->all();
        return view('remedios', ['remedios' => $remedios]);   
    }

    public function create()
    {
        return view('remedio_create');    
    }

    public function store(StoreUpdateRequest $request)
    {
        $created = $this->remedio->create([
            'nome' => $request->input('nome'),
            'quantidade' => $request->input('quantidade'),
            'valor' => $request->input('valor'),
            'validade' => $request->input('validade'),
        ]);
        if($created){
            return redirect()->back()->with('message', 'Adicionado com sucesso!');
        }

        return redirect()->back()->with('message', 'Ops!Algo deu errado');
    }

    public function show(string $id)
    {
        return view('remedios', ['remedio' => $remedio]);
    }

    public function edit(Remedio $remedio)
    {
        return view('remedio_edit', ['remedio' => $remedio]);
    }

    public function update(StoreUpdateRequest $request, string $id)
    {
        $updated = $this->remedio->where('id', $id)->update($request->except(['_token', '_method']));
        if($updated){
            return redirect()->back()->with('message', 'Atualizado com sucesso!');
        }

        return redirect()->back()->with('message', 'Ops!Algo deu errado');

    }   

    public function destroy(string $id)
    {
        $this->remedio->where('id', $id)->delete();

        return redirect()->route('remedios');
    }
}