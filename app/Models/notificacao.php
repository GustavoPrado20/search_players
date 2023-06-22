<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notificacao extends Model
{
    use HasFactory;

    protected $table = 'notificacoes';

    protected $fillable = [
        'notificacao',
        'link',
        'status',
    ];
    
    //Revertendo relacacao com a model User
    public function User(){
        return $this->belongsTo(related: User::class, foreignKey: ['id_usuario_1', 'id_usuario_2'], ownerKey: 'id');
    }
}
