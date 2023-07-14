<?php

namespace App\Http\Controllers;

use App\Models\jogadores_time;
use App\Repositories\TimesRepository;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $jogador = jogadores_time::where('id_jogador', $id_usuario)->first();
        
        return view("config.config-perfil", ["dadosUsuario" => $dadosUsuario, "time" => $time, "jogador" => $jogador]);
    }

    public function updatePerfil(Request $request)
    {
        $id_usuario = auth()->user()->id;
        $dadosUsuario = UserRepository::find($id_usuario);

        if(Hash::check($request['senha'], $dadosUsuario['password']))
        {
            $link = $dadosUsuario['site'];
            $foto = $dadosUsuario['foto'];
            $banner = $dadosUsuario['banner'];

            if(!empty($request['foto']))
            {
                unlink(public_path('img/foto_perfis/'.$foto));
                $foto = UserRepository::pixelsFoto($request['foto']);
            }

            if(!empty($request['banner']))
            {
                unlink(public_path('img/foto_perfis/'.$banner));
                $banner = UserRepository::pixelsBanner($request['banner']);
            }

            if(!empty($request['site']))
            {
                $link = UserRepository::formatLink($request['site']);
            }

            $data = ["nome" => $request['nome'], "foto" => $foto, "sobre" => $request['sobre'], "site" => $link, "esporte" => $request['esporte'], "banner" => $banner];

            $update = UserRepository::update($id_usuario, $data);

            if($update)
            {
                return redirect()->intended('/configuração/perfil');
            }
        }
    }

    public function deleteFoto()
    {
        $id_usuario = auth()->user()->id;
        $dadosUsuario = UserRepository::find($id_usuario);

        $data = ["foto" => null];

        $update = UserRepository::update($id_usuario, $data);

        if($update)
        {
            unlink(public_path('img/foto_perfis/'.$dadosUsuario['foto']));

            return redirect()->intended('/configuração/perfil');
        }
    }

    public function deleteBanner()
    {
        $id_usuario = auth()->user()->id;
        $dadosUsuario = UserRepository::find($id_usuario);

        $data = ["banner" => null];

        $update = UserRepository::update($id_usuario, $data);

        if($update)
        {
            unlink(public_path('img/banners_perfis/'.$dadosUsuario['banner']));

            return redirect()->intended('/configuração/perfil');
        }
    }
}
