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

    //revertendo relacao com a model User
    public function User(){
        return $this->belongsToMany(related: User::class, foreignKey: 'id_usuario', ownerKey: 'id');
    }
}
