<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\jogadores_time;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JogadoresTimesRepository extends AbstractRepository
{
    protected static $model = jogadores_time::class;

    public static function findByIdJogador(string $id_jogador){
        return self::loadModel()::query()->where(colum: ['id_jogador' => $id_jogador])->get();  
    }

}