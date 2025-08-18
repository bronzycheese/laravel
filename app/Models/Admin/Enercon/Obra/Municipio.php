<?php

namespace App\Models\Admin\Enercon\Obra;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $fillable = ['nome', 'telefone', 'status'];
}

// Migration: create_municipios_table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('telefone')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('municipios');
    }
};

