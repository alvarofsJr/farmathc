<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Fornecedor;

class DashboardController extends Controller
{
    public function index()
    {
        $produtosCount = Produto::count();
        $fornecedoresCount = Fornecedor::count();
        
        return view('dashboard')
            ->with('produtosCount', $produtosCount)
            ->with('fornecedoresCount', $fornecedoresCount);
    }
}