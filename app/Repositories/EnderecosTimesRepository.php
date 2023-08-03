<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\endereco_time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnderecosTimesRepository extends AbstractRepository
{
    protected static $model = endereco_time::class;

    public static function findByIdTime(int $id_time){
        return self::loadModel()::query()->where('id_time', '=', $id_time)->first();  
    }
}