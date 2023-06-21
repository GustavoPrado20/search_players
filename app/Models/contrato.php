<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contrato extends Model
{
    use HasFactory;

    protected $table = 'contratos';

    protected $fillable = [
        'preco',
        'status',
        'tipo_contrato',
        'posicao',
    ];
}
