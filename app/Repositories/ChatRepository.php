<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatRepository extends AbstractRepository
{
    protected static $model = chat::class;

    public static function registro($id_usuario, $id_destino)
    {
        $array = [$id_usuario, $id_destino];
        $array2 = [$id_destino, $id_usuario];

        $registro1 = implode(' - ', $array);
        $registro2 = implode(' - ', $array2);

        return [$registro1, $registro2];
    }

    public static function formatarData($data){
        setlocale(LC_TIME, 'pt_BR.UTF-8', 'pt_BR.UTF-8', 'pt_BR.UTF-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        return strftime('%H:%M', strtotime($data));
    }
}