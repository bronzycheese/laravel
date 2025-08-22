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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->id('servicoId');
            $table->id('faseId');
            $table->string('item');
            $table->string('referencial');
            $table->text('descricao');
            $table->string('unidade');
            $table->integer('quantidade');
            $table->integer('precoUnitarioComBdi');
            $table->integer('precoTotalComBdi');
            $table->integer('precoUnitarioSemBdi');
            $table->integer('precoTotalSemBdi');
            $table->integer('precoTotalFase');
            $table->string('notaTecnica')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
