<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class campeonato extends Model
{
    use HasFactory;

    protected $table = 'campeonatos';

    protected $fillable = [
        'nome',
        'premiacao',
        'taxa_inscricao',
        'numero_times',
        'data_inicio',
        'data_fim',
        'tipo',
        'foto',
    ];

    //relacao com a model times_campeonato
    public function times_campeonato(){
        return $this->hasMany(related: times_campeonato::class, foreignKey: 'id_campeonato', ownerKey: 'id');
    }

    //revertendo a relacao com a model User
    public function User(){
        return $this->belongsTo(related: User::class, foreignKey: 'id_organisador', ownerKey: 'id');
    }

    //revertendo a relacao com a model partida
    public function partida(){
        return $this->belongsTo(related: partida::class, foreignKey: 'id_campeonato', ownerKey: 'id');
    }
}
