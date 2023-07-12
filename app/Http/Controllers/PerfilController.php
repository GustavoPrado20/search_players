<?php

namespace App\Http\Controllers;

use App\Repositories\EnderecosRepository;
use App\Repositories\TimesRepository;
use App\Repositories\UserRepository;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = auth()->user()->id;

        $endereco = EnderecosRepository::findByIdUsuario($id);

        $times = TimesRepository::all()->where('id_usuario', '=', $id);

        $dadosUsuario = UserRepository::find($id);
        
        $dataDeNascimento = $dadosUsuario['data_nascimento'];
        $date = new DateTime($dataDeNascimento);
        $interval = $date->diff( new DateTime( date('d-m-Y') ) );

        return view('perfil', ['dadosUsuario' => $dadosUsuario, 'endereco' => $endereco, 'times' => $times, 'data' => $interval]);
    }
}
