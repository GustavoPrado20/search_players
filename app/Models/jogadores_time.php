<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jogadores_time extends Model
{
    use HasFactory;

    protected $table = 'jogadores_times';

    protected $fillable = 'posicao';
}
