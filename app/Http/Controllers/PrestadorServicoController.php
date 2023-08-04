<?php

namespace App\Http\Controllers;

use App\Models\PrestadorServico;
use Illuminate\Http\Request;

class PrestadorServicoController extends Controller
{
    public function store(Request $request)
    {
        // Criar uma nova associação entre prestador e serviço
        $prestadorServico = PrestadorServico::create($request->all());
        return response()->json($prestadorServico, 201);
    }

    // Outros métodos para atualizar, excluir, listar, etc.
}
