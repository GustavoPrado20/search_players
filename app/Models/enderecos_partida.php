<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enderecos_partida extends Model
{
    use HasFactory;

    protected $table = 'enderecos_partidas';

    protected $fillable = [
        'cep',
        'estado',
        'cidade',
        'bairro',
        'rua',
        'numero',
    ];

    //revertendo relacao com a model partida
    public function partida(){
        return $this->belongsTo(related: partida::class, foreignKey: 'id_partida', ownerKey: 'id');
    }
}
