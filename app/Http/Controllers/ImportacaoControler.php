<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ImportacaoController extends Controller
{
    public function importar(Request $request)
    {
        $file = $request->file('csv_file');

        // Faça a validação do arquivo CSV aqui, se necessário

        $csvData = array_map('str_getcsv', file($file->path()));
        $csvHeader = array_shift($csvData);

        // Importe os dados do arquivo CSV para o banco de dados
        foreach ($csvData as $row) {
            $servico = new Servico();
            $servico->nome = $row[0];
            $servico->descricao = $row[1];
            $servico->valor = $row[2];
            $servico->save();
        }

        return response()->json(['message' => 'Importação concluída com sucesso.']);
    }
}

