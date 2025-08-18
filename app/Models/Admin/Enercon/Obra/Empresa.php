<?php

namespace App\Models\Admin\Enercon\Obra;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['municipio_id', 'nome', 'telefone', 'status'];

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
}

return new class extends Migration {
    public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('municipio_id')->constrained('municipios')->onDelete('cascade');
            $table->string('nome');
            $table->string('telefone')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
