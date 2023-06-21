<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sugestao extends Model
{
    use HasFactory;

    protected $table = 'sugestoes';

    protected $fillable = [
        'sugestao',
    ];

    
}
