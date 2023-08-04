<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function index()
    {
        // Retornar a lista de todos os serviços
        $servicos = Servico::paginate(10); // Paginação com 10 registros por página
        return response()->json($servicos);
    }

    public function store(Request $request)
    {
        // Criar um novo serviço com base nos dados recebidos do formulário
        $servico = Servico::create($request->all());
        return response()->json($servico, 201); // Retorna o serviço criado com status 201 (Created)
    }

    // Outros métodos para atualizar, excluir, associar prestadores, etc.
}
