<?php

namespace App\Models\Admin\Enercon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoUnidades extends Model
{
     use HasFactory;

    protected $fillable = [
        'nome'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
