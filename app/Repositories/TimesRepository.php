<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\times;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimesRepository extends AbstractRepository
{
    protected static $model = times::class;

    public static function findByIdDono(int $id_dono){
        return self::loadModel()::query()->where( ['id_dono' => $id_dono])->first();  
    }
}