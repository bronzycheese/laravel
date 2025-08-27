<?php
namespace App\Models\Admin\Enercon\Obra;

use Illuminate\Database\Eloquent\Model;

class Situacao extends Model
{
    protected $fillable = ['nome', 'status'];
}

return new class extends Migration {
    public function up(): void
    {
        Schema::create('situacoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
             $table->enum('status', ['ativo', 'inativo'])->default('ativo');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('situacoes');
    }
};

