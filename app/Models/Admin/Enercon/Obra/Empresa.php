<?php

namespace App\Models\Admin\Enercon\Obra;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empresa extends Model
{
     use HasFactory;

    protected $fillable = [
        'nome', 'razao_social', 'cnpj', 'inscricao_estadual', 'endereco', 'cidade', 'estado', 'cep', 'telefone', 'email', 'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
