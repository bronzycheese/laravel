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
            $table->integer('servico_id')->index()->nullable();
            $table->integer('fase_id')->index()->nullable();
            $table->string('item')->nullable();
            $table->string('codigo')->nullable();
            $table->string('serv')->nullable();
            $table->string('referencial')->nullable();
            $table->text('descricao')->nullable();
            $table->string('dmt')->nullable();
            $table->string('unidade')->nullable();
            $table->integer('quantidade')->nullable();
            $table->decimal('preco_unitario_sem_boi')->defalt('0.00');
            $table->decimal('preco_total_sem_boi')->defalt('0.00');
            $table->decimal('preco_unitario_com_boi')->defalt('0.00');
            $table->decimal('preco_total_com_boi')->defalt('0.00');
            $table->text('nota_tecnica')->nullable();
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
