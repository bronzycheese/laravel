<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
           
            $table->string('nome')->nullable();
            $table->string('razao_social')->nullable();
            $table->string('cnpj', 18)->unique()->nullable();
            $table->string('inscricao_estadual')->nullable();
            $table->string('endereco')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado', 2)->nullable();
            $table->string('cep', 9)->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            
            $table->enum('status', ['ativo', 'inativo'])->default('ativo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
