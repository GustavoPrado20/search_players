<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class times extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cep',
        'estado',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'brasao',
        'lema',
        'esporte',
        'pontos',
    ];
}
