<?php

namespace App\Http\Controllers;

use App\Repositories\EnderecosRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class ConfiguracaoLocalizacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id_usuario = auth()->user()->id;

        $dadosUsuario = UserRepository::find($id_usuario);
        $endereco = EnderecosRepository::findByIdUsuario($id_usuario);

        return view('config.config-localizacao', ["dadosUsuario" => $dadosUsuario, "endereco" => $endereco]);
    }
}
