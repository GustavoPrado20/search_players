<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class times extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'brasao',
        'lema',
        'esporte',
        'pontos',
    ];
}
