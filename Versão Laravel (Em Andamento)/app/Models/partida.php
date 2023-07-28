<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partida extends Model
{
    use HasFactory;

    protected $table = 'partidas';

    protected $fillable = [
        'data',
        'hora',
        'resultado',
    ];

    //revertendo relacao com a model times
    public function times(){
        return $this->belongsTo(related: times::class, foreignKey: ['id_time_1', 'id_time_2'], ownerKey: 'id');
    }

    //revertendo relacao com a model User
    public function User(){
        return $this->belongsTo(related: User::class, foreignKey: 'id_analisador', ownerKey: 'id');
    }

    public function campeonato(){
        return $this->hasMany(related: campeonato::class, foreignKey: 'id_campeonato', localKey: 'id');
    }
}
