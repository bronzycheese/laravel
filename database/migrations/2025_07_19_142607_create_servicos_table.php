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
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cidade_id')->constrained('cidades')->onDelete('cascade');
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->string('cor')->default('#000000');
            $table->text('icone')->default('road');
            $table->integer('ordem')->default(1);
            $table->string('telefone')->nullable();
            $table->boolean('ativo')->default(true);
            $table->boolean('chamada')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
