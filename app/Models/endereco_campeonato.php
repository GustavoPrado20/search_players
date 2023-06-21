<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class endereco_campeonato extends Model
{
    use HasFactory;

    protected $table = 'enderecos_campeonatos';

    protected $fillable = [
        'cep',
        'estado',
        'cidade',
    ];
}
