<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $id = auth()->user()->id;

        $dadosUsuario = UserRepository::find($id);

        $dados = UserRepository::all()->where('id', '!=', $id);

        //return dd($dados);

        return view('chat.contatos-chat',["dados" => $dados, "dadosUsuario" => $dadosUsuario]);
    }

    public function pesquisar(Request $request)
    {

    }

    public function chat()
    {

    }

    public function chat_time()
    {

    }
}
