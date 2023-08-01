<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnderecosRepository extends AbstractRepository
{
    protected static $model = endereco::class;

    public static function findByIdUsuario(int $id_usuario){
        return self::loadModel()::query()->where('id_usuario', '=', $id_usuario)->first();  
    }
}