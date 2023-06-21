<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class campeonato extends Model
{
    use HasFactory;

    protected $table = 'campeonatos';

    protected $fillable = [
        'nome',
        'premiacao',
        'taxa_inscricao',
        'numero_times',
        'data_inicio',
        'data_fim',
        'tipo',
        'foto',
    ];
}
