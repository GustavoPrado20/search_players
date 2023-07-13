<?php

namespace App\Http\Controllers;

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
        
        return view("config.config-perfil", ["dadosUsuario" => $dadosUsuario, "time" => $time]);
    }

    public function update(Request $request)
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
                $foto = UserRepository::pixelsFoto($request['foto']);
            }

            if(!empty($request['banner']))
            {
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

        echo '<script type="text/javascript">$(document).ready(function(){$("#senha_incorreta").modal("show");});</script>';
    }
}
