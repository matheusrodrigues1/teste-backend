<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestadorServico extends Model
{
    use HasFactory;

    protected $table = 'prestador_servico';

    protected $fillable = [
        'prestador_id',
        'servico_id',
        'valor',
    ];

    // Defina os relacionamentos com os modelos Prestador e Servico
    public function prestador()
    {
        return $this->belongsTo(Prestador::class);
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }
}
