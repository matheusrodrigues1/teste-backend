<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabela de prestadores
        Schema::create('prestadores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('telefone');
            $table->string('email')->unique();
            $table->string('foto')->nullable();
            $table->timestamps();
        });

        // Tabela de serviços
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->decimal('valor', 8, 2);
            $table->timestamps();
        });

        // Tabela intermediária para relacionar prestadores aos serviços
        Schema::create('prestador_servico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prestador_id');
            $table->unsignedBigInteger('servico_id');
            $table->timestamps();

            $table->foreign('prestador_id')->references('id')->on('prestadores')->onDelete('cascade');
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestador_servico');
        Schema::dropIfExists('servicos');
        Schema::dropIfExists('prestadores');
    }
};
