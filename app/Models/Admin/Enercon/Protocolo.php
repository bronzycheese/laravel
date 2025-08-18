<?php

namespace App\Models\Admin\Enercon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Protocolo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'tipo',
        'endereco',
        'cidade',
        'estado',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
