<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class times extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'brasao',
        'lema',
        'esporte',
        'pontos',
    ];

    //revertendo o relacionamento com a model user
    public function User(){
        return $this->belongsTo(related: User::class, foreignKey: 'id_usuario', ownerKey: 'id');
    }

    //relacionamento com a model times_campeonato
    public function times_campeonato(){
        return $this->hasMany(related: times_campeonato::class, foreignKey: 'id_time', localKey: 'id');
    }

    //relacionamento com a model partidas
    public function partida(){
        return $this->hasMany(related: partida::class, foreignKey: ['id_time_1', 'id_time_2'], localKey: 'id');
    }

    //relacionamento com a model jogadores_time
    public function jagadores_time(){
        return $this->hasMany(related: jogadores_time::class, foreignKey: 'id_time', localKey: 'id');
    }

    //relacionamento com a model esndereco_time
    public function endereco_time(){
        return $this->hasOne(related: endereco_time::class, foreignKey: 'id_time', localKey: 'id');
    }

    //relacionamento com a model contrato
    public function contrato(){
        return $this->hasMany(related: contrato::class, foreignKey: 'id_time', localKey: 'id');
    }

    //relacionamento com a model chat_time
    public function chat_time(){
        return $this->hasMany(related: chat_time::class, foreigKey: 'id_time', localKey: 'id');
    }
}
