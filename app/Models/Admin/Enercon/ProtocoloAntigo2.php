<?php

namespace App\Models\Admin\Enercon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProtocoloAntigo2 extends Model
{
    use SoftDeletes;

    protected $table = 'protocolos';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'cidade_id',
        'user_id',
        'tipo_protocolo',
        'cep',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'descricao',
        'telefone',
        'status',
        'atualizacoes_nao_lidas',
        'precisa_resposta',
        'ativo',
    ];

    protected $hidden = [
        // Nenhum campo explicitamente sensível foi informado,
        // mas você pode esconder os timestamps ou soft deletes se quiser:
        // 'created_at', 'updated_at', 'deleted_at',
    ];

    protected $casts = [
        'id' => 'string',
        'cidade_id' => 'string',
        'user_id' => 'string',
        'tipo_protocolo' => 'string',
        'cep' => 'string',
        'endereco' => 'string',
        'numero' => 'string',
        'bairro' => 'string',
        'cidade' => 'string',
        'uf' => 'string',
        'descricao' => 'string',
        'telefone' => 'string',
        'status' => 'string',
        'atualizacoes_nao_lidas' => 'integer',
        'precisa_resposta' => 'boolean',
        'ativo' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Gera um UUID automaticamente ao criar o modelo
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}
