<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\feedbck_saida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackSaidaRepository extends AbstractRepository
{
    protected static $model = feedbck_saida::class;

    public static function findByIdUsuario(int $id_usuario){
        return self::loadModel()::query()->where('id_usuario', '=', $id_usuario)->first();  
    }
}