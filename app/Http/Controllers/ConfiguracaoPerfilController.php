<?php

namespace App\Http\Controllers;

use App\Repositories\JogadoresTimesRepository;
use App\Repositories\TimesRepository;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class ConfiguracaoPerfilController extends Controller
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
        $jogador = JogadoresTimesRepository::findByIdJogador($id_usuario);

        

        
    }
}
