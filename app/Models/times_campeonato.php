<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class times_campeonato extends Model
{
    use HasFactory;

    protected $fillable = [
        'colocacao',
        'pontos',
        'status',
    ];

    //revertendo a relacao com a model times 
    public function times(){
        return $this->belongsTo(related: times::class, foreignKey: 'id_time', ownerKey: 'id');
    }

    //revertendo a relacao com a model campeonato
    public function campeonato(){
        return $this->belongsTo(related: campeonato::class, foreignKey: 'id_campeonato', ownerKey: 'id');
    }
}
