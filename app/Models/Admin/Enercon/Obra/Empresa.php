<?php

namespace App\Models\Admin\Enercon\Obra;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['empresa_id', 'nome', 'telefone', 'status'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}

return new class extends Migration {
    public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');
            $table->string('nome');
            $table->string('telefone')->nullable();
            $table->integer('CEP');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
