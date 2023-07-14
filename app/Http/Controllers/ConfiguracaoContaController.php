<?php

namespace App\Http\Controllers;

use App\Models\jogadores_time;
use App\Models\times;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class ConfiguracaoContaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id_usuario = auth()->user()->id;

        $dadosUsuario = UserRepository::find($id_usuario);
        $time = times::where('id_dono', $id_usuario)->first();
        $jogador = jogadores_time::where('id_jogador', $id_usuario)->first();

        return view('config.config-conta', ["dadosUsuario" => $dadosUsuario, "time" => $time, "jogador" => $jogador]);
    }
}
