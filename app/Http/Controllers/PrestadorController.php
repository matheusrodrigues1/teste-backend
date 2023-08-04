<?php

namespace App\Http\Controllers;

use App\Models\Prestador;
use Illuminate\Http\Request;

class PrestadorController extends Controller
{
    public function index()
    {
        // Retornar a lista de todos os prestadores
        $prestadores = Prestador::paginate(10); // Paginação com 10 registros por página
        return response()->json($prestadores);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|unique:prestadores,email',
        ]);
        // Criar um novo prestador com base nos dados recebidos do formulário
        $prestador = Prestador::create($request->all());
        return response()->json($prestador, 201); // Retorna o prestador criado com status 201 (Created)
    }

    public function totalServicosRealizados($id)
    {
        $prestador = Prestador::findOrFail($id);
        $totalServicos = $prestador->servicos->count();

        return response()->json(['total_servicos_realizados' => $totalServicos]);
    }

    // Outros métodos para atualizar, excluir, associar serviços, etc.
}
