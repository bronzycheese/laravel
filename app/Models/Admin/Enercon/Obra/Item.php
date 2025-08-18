<?php

namespace App\Models\Admin\Enercon\Obra;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'fase_id','servico_id','item','codigo','serv_inst','referencial',
        'descricao','dmt','unidade','quantidade','preco_unitario_sem_bdi',
        'preco_total_sem_bdi','preco_unitario_com_bdi','preco_total_com_bdi',
        'nota_tecnica','total_da_fase_servicos'
    ];
}

return new class extends Migration {
    public function up(): void
    {
        Schema::create('itens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fase_id')->constrained('fases')->onDelete('cascade');
            $table->foreignId('servico_id')->constrained('servicos')->onDelete('cascade');
            $table->string('item');
            $table->string('codigo')->nullable();
            $table->string('serv_inst')->nullable();
            $table->string('referencial')->nullable();
            $table->text('descricao')->nullable();
            $table->string('dmt')->nullable();
            $table->string('unidade')->nullable();
            $table->decimal('quantidade', 12, 2)->default(0);
            $table->decimal('preco_unitario_sem_bdi', 15, 2)->default(0);
            $table->decimal('preco_total_sem_bdi', 15, 2)->default(0);
            $table->decimal('preco_unitario_com_bdi', 15, 2)->default(0);
            $table->decimal('preco_total_com_bdi', 15, 2)->default(0);
            $table->text('nota_tecnica')->nullable();
            $table->decimal('total_da_fase_servicos', 15, 2)->default(0);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('itens');
    }
};
