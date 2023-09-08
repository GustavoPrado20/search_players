<?php

namespace App\Http\Controllers;

use App\Repositories\EnderecosTimesRepository;
use App\Repositories\TimesRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class ConfiguracaoTimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id_usuario = auth()->user()->id;

        $dadosUsuario = UserRepository::find($id_usuario);

        $time = TimesRepository::findByIdDono($id_usuario);
        $endereco = null;

        if(!empty($time))
        {
            $endereco = EnderecosTimesRepository::findByIdTime($time['id']);
        }

        return view('config.config-time', ["dadosUsuario" => $dadosUsuario, "time" => $time, "endereco" => $endereco]);
    }
}
