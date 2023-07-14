<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedbck_saida extends Model
{
    use HasFactory;

    protected $table = 'feedbck_saidas';

    protected $fillable = [
        'opiniao'
    ];

    //Revertendo relacao com a model User
    public function User(){
        return $this->belongsTo(related: User::class, foreignKey: 'id_usuario', ownerKey: 'id');
    }
}
