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
            $table->uuid('id')->primary();
            $table->uuid('cidade_id')->nullable();
            $table->uuid('user_id')->nullable();
            $table->string('tipo_protocolo')->default('Solicitação de Iluminação Pública');
            $table->string('cep', 9)->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf', 2)->nullable();
            $table->text('descricao')->nullable();
            $table->string('telefone', 20)->nullable();
            $table->string('status')->default('pendente');
            $table->unsignedInteger('atualizacoes_nao_lidas')->default(0);
            $table->boolean('precisa_resposta')->default(false);
            $table->boolean('ativo')->default(true);
            $table->timestamps();
            $table->softDeletes();
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
