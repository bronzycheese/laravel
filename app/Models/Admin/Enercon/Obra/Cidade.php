<?php

namespace App\Models\Admin\Enercon\Obra;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cidade extends Model
{
     use HasFactory;

     protected $fillable = [
        'nome', 'slug', 'estado', 'nome_banco_dados', 'brasao', 'logo_prefeitura', 'cor_principal', 'telefone_prefeitura', 'email_ouvidoria', 'site', 'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($model) {
            // Gera o slug baseado no campo "nome"
            if (isset($model->nome)) {
                $model->slug = Str::slug($model->nome);
            }
        });
    
        static::updating(function ($model) {
            // Atualiza o slug caso o nome tenha sido alterado
            if ($model->isDirty('nome')) {
                $model->slug = Str::slug($model->nome);
            }
        });
    }

}
