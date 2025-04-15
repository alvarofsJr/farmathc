<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Fornecedor;
use App\Models\Categoria;
use App\Models\Remedio;


class DashboardController extends Controller
{
    public function index()
    {
        $produtosCount = Produto::count();
        $fornecedoresCount = Fornecedor::count();
        
        $categoriasCount =Categoria::count();
        $remediosCount =Remedio::count();
        
        return view('dashboard')
            ->with('produtosCount', $produtosCount)
            ->with('fornecedoresCount', $fornecedoresCount)
            
            ->with('categoriasCount', $categoriasCount)
            ->with('remediosCount', $remediosCount);
            

    }
}