<?php

namespace App\Models\Admin\Enercon\Obra;

use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    protected $fillable = ['obra_id','nome'];
}

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obra_id')->constrained('obras')->onDelete('cascade');
            $table->string('nome')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('fases');
    }
};

