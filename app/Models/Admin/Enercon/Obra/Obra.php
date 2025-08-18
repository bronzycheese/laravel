<?php

namespace App\Models\Admin\Enercon\Obra;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $fillable = [
        'municipio_id','empresa_id','nome','objetivo','local','prazo',
        'data_inicio','data_fim','sist_ref','situacao_id','status'
    ];
}

return new class extends Migration {
    public function up(): void
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('municipio_id')->constrained('municipios')->onDelete('cascade');
            $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');
            $table->string('nome');
            $table->text('objetivo')->nullable();
            $table->text('local')->nullable();
            $table->string('prazo')->nullable();
            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();
            $table->text('sist_ref')->nullable();
            $table->foreignId('situacao_id')->constrained('situacoes')->onDelete('cascade');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};



