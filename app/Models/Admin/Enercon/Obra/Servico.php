<?php

namespace App\Models\Admin\Enercon\Obra;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = ['fase_id','nome'];
}

return new class extends Migration {
    public function up(): void
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fase_id')->constrained('fases')->onDelete('cascade');
            $table->string('nome');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
