<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partida extends Model
{
    use HasFactory;

    protected $table = 'partidas';

    protected $fillable = [
        'data',
        'hora',
        'resultado',
    ];
}
