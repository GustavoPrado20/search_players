<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\notificacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificaRepository extends AbstractRepository
{
    protected static $model = notificacao::class;

    public static function findByIdDestino(int $id_destino){
        return self::loadModel()::query()->where('id_usuario_2', '=', $id_destino)->orderBy('id_usuario_1', 'DESC')->get();  
    }
}