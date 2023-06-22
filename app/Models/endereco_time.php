<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class endereco_time extends Model
{
    use HasFactory;

    protected $table = 'enderecos_times';

    protected $fillable = [
        'cep',
        'estado',
        'cidade',
        'bairro',
        'rua',
        'numero',
    ];

    //revertendo relacao com a model time
    public function times(){
        return $this->belongsTo(related: times::class, foreignKey: 'id_time', ownerKey: 'id');
    }
}
