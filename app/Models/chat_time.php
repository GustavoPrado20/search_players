<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat_time extends Model
{
    use HasFactory;

    protected $table = 'chat_times';

    protected $fillable = [
        'mensagem'
    ];

    //revertendo relacao com a model times
    public function times(){
        return $this->belongsTo(related: times::class, foreignKey: 'id_time', ownerKey: 'id');
    }

    //revertendo relacao com a model User
    public function User(){
        return $this->belongsTo(related: User::class, foreignKey: 'id_usuario', ownerKey: 'id');
    }
}
