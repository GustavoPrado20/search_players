<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;

    protected $table = 'chats';

    protected $fillable = [
        'mensagem',
        'registro_conversa',
    ];

    //revertendo relacao com a model User
    public function User(){
        return $this->belongsTo(related: User::class, foreignKey: ['id_usuario', 'id_destino'], ownerKey: 'id');
    }
}
