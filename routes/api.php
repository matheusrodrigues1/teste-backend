<?php

use App\Http\Controllers\PrestadorController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\PrestadorServicoController;

Route::post('/prestador_servico', [PrestadorServicoController::class, 'store']);
Route::apiResource('prestadores', PrestadorController::class);
Route::apiResource('servicos', ServicoController::class);
Route::post('/importacao', [ImportacaoController::class, 'importar']);

