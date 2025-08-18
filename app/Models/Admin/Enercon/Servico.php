<?php

namespace App\Models\Admin\Enercon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Servico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'cor',
        'cidade_id',
        'status',
        'icone',
        'ordem',
        'chamada',
        'telefone',
        'ativo'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
