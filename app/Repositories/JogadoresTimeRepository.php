<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\jogadores_time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JogadoresTimeRepository extends AbstractRepository
{
    protected static $model = jogadores_time::class;

    public static function findByIdTime(int $id_time){
        return self::loadModel()::query()->where( ['id_time' => $id_time])->get();  
    }

    public static function numeroJogadores(int $id_time){
        return self::loadModel()::query()->where( ['id_time' => $id_time])->count();  
    }
}