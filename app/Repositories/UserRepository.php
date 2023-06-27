<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRepository extends AbstractRepository
{
    protected static $model = User::class;

    public static function findByEmail(string $email){
        return self::loadModel()::query()->where(colum: ['email' => $email])->first();  
    }


}