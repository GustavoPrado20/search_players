<?php

namespace App\Http\Controllers;

use App\Models\jogadores_time;
use App\Models\times;
use App\Repositories\FeedbackSaidaRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function updateConta(Request $request)
    {
        $id_usuario = auth()->user()->id;
        $dadosUsuario = UserRepository::find($id_usuario);

        $dataNascimento = $dadosUsuario['data_nascimento'];
        $preco = $dadosUsuario['preco'];

        if(Hash::check($request['senha'], $dadosUsuario['password']))
        {
            if(!empty($request['preco']))
            {
                $preco = $request['preco'];
            }
            if(!empty($request['data_n']))
            {
                $dataNascimento = $request['data_n'];
            }
            
            $dados = ["email" => $request['email'], "tipo_usuario" => $request['tipo'], "sexo" => $request['sexo'], "preco" => $preco, "data_nascimento" => $dataNascimento];
            
            $update = UserRepository::update($id_usuario, $dados);

            if($update)
            {
                return redirect()->intended('/configuração/conta');
            }
        }
    }

    public function updateSenha(Request $request)
    {
        $id_usuario = auth()->user()->id;
        $dadosUsuario = UserRepository::find($id_usuario);

        if(Hash::check($request['senha_a'], $dadosUsuario['password']))
        {
            $dados = ["password" => hash::make($request['senha_n'])];

            $update = UserRepository::update($id_usuario, $dados);

            if($update)
            {
                return redirect()->intended('/configuração/conta');
            }
        }
    }

    public function deleteContaIndex()
    {
        $id_usuario = auth()->user()->id;
        $dadosUsuario = UserRepository::find($id_usuario);

        return view('config.config-delete-conta', ["dadosUsuario" => $dadosUsuario]);
    }

    public function deleteConta(Request $request)
    {
        $id_usuario = auth()->user()->id;
        $dadosUsuario = UserRepository::find($id_usuario);
        $problema = $request['problema'];

        $dadosProblema = ["nome" => $dadosUsuario['nome'], "email" => $dadosUsuario['email'], "id_usuario" => $id_usuario, "opiniao" => $problema];

        $feedback = FeedbackSaidaRepository::create($dadosProblema);

        if($feedback)
        {
            UserRepository::delete($id_usuario);
            return redirect(route('logout'));
        }
    }
}
