<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contrato extends Model
{
    use HasFactory;

    protected $table = 'contratos';

    protected $fillable = [
        'preco',
        'status',
        'tipo_contrato',
        'posicao',
    ];

    //revertendo relacao com a model User
    public function User(){
        return $this->belongsTo(related: User::class, foreignKey: ['id_jogador', 'id_contratante'], ownerKey: 'id');
    }

    //Revertendo relacao com a model times
    public function times(){
        return $this->belongsTo(related: times::class, foreignKey: 'id_time', ownerKey: 'id');
    }
}
