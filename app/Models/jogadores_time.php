<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jogadores_time extends Model
{
    use HasFactory;

    protected $table = 'jogadores_times';

    protected $fillable = 'posicao';

    //revertendo a relacao com a model Times
    public function times(){
        return $this->belongsTo(related: times::class, foreignKey: 'id_time', ownerKey: 'id');
    }

    //revertendo a relacao com a model User
    public function User(){
        return $this->belongsToMany(related: User::class, foreignKey: 'id_jogador', ownerKey: 'id');
    }
}
