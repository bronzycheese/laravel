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
        Schema::create('protocolos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->enum('tipo', ['solicitacao', 'reclamacao', 'sugestao']);
            $table->string('endereco');
            $table->string('cidade');
            $table->string('estado');
            $table->enum('status', ['pendente', 'em_andamento', 'concluido', 'cancelado'])->default('pendente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('protocolos');
    }
};
