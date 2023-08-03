<?php

namespace App\Http\Controllers;

use App\Models\endereco_time;
use App\Repositories\EnderecosTimesRepository;
use App\Repositories\JogadoresTimeRepository;
use App\Repositories\TimesRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class MeuTimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id_usuario = auth()->user()->id;
        $dadosUsuario = UserRepository::find($id_usuario);

        $dadosTime = null;
        $enderecoTime = null;
        $numeroJogadores = 0;
        $jogadoresTime = null;
        
        if(TimesRepository::findByIdDono($id_usuario))
        {
            $dadosTime = TimesRepository::findByIdDono($id_usuario);
            $enderecoTime = EnderecosTimesRepository::findByIdTime($dadosTime['id']);

            $numeroJogadores = JogadoresTimeRepository::numeroJogadores($dadosTime['id']);
            $jogadoresTime = JogadoresTimeRepository::findByIdTime($dadosTime['id']);
        }

        return view('menu.meu-time', ["dadosTime" => $dadosTime, "numeroJogadores" => $numeroJogadores, "jogadoresTime" => $jogadoresTime, "enderecoTime" => $enderecoTime, "dadosUsuario" => $dadosUsuario]);
    }

    public function registrarTime(Request $request)
    {
        $id_usuario = auth()->user()->id;
        $dadosUsuario = UserRepository::find($id_usuario);

        $data = ["nome" => $request['nome'], "id_dono" => $id_usuario, "lema" => $request['lema'], "esporte" => $dadosUsuario['esporte']];

        $registrar = TimesRepository::create($data);

        if($registrar)
        {
            return redirect(Route('meu_time'));
        }
        
    }
}
