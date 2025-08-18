<?php

namespace App\Models\Admin\Enercon\Obra;

use Illuminate\Database\Eloquent\Model;

class TipoUnidade extends Model
{
    protected $fillable = ['nome','tipo','status'];
}

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tipo_unidades', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('tipo')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('tipo_unidades');
    }
};


