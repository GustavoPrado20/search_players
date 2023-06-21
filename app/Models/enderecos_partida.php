<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enderecos_partida extends Model
{
    use HasFactory;

    protected $table = 'enderecos_partidas';

    protected $fillable = [
        'cep',
        'estado',
        'cidade',
        'bairro',
        'rua',
        'numero',
    ];
}
