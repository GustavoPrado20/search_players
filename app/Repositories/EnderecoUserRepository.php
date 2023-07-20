<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnderecoUserRepository extends AbstractRepository
{
    protected static $model = endereco::class;

    public static function findByIdUser(int $id_user){
        return self::loadModel()::query()->where( ['id_usuario' => $id_user])->first();  
    }
}