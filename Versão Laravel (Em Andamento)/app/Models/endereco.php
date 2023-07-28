<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class endereco extends Model
{
    use HasFactory;

    protected $table = 'enderecos';

    protected $fillable = [
        'cep',
        'estado',
        'cidade',
        'bairro',
    ];

    //revertendo o relacionamento com a model user
    public function user(){
        return $this->belongsTo(related: User::class, foreignKey: 'id_usuario', ownerKey: 'id');
    }
}
