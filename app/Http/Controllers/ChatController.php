<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\ChatRepository;
use App\Models\User;
use App\Models\chat;
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

        return view('chat.contatos-chat',["dados" => $dados, "dadosUsuario" => $dadosUsuario]);
    }

    public function pesquisar(Request $request)
    {
        $id = auth()->user()->id;   
        
        $dadosUsuario = UserRepository::find($id);

        $caracter = $request['caracter'];

        $dados = User::where([['nome', 'like', '%'.$caracter.'%'],['id', '!=', $id]])->get(); //Recebendo dados conforme a busca do usuario

        return view('chat.contatos-chat',["dados" => $dados, "dadosUsuario" => $dadosUsuario]);
    }

    public function chat(Request $request)
    {   
        $id_usuario = auth()->user()->id;
        $id_destino = intval($request['id_destino']);

        session()->put('id_destino', $id_destino);

        $dadosUsuario = UserRepository::find($id_usuario);
        $dadosDestino = UserRepository::find($id_destino);

        return view('chat.chat',["dadosUsuario" => $dadosUsuario, "dadosDestino" => $dadosDestino, "id_destino" => $id_destino]);
    }

    public function registro_chat(Request $request)
    {
        $id_usuario = auth()->user()->id;
        $id_destino = $request['id_destino'];

        $dadosUsuario = UserRepository::find($id_usuario);
        $dadosDestino = UserRepository::find($id_destino);

        $mensagem = trim($request['mensagem']);

        $registro = ChatRepository::registro($id_usuario, $id_destino);

        $registarConversa = ChatRepository::create(['mensagem' => $mensagem, 'registro_conversa' => $registro[0]]);

        if($registarConversa)
        {
            return redirect()->route('chat',["dadosUsuario" => $dadosUsuario, "dadosDestino" => $dadosDestino, "id_destino" => $id_destino]);
        }
    }

    public function dados_chat(Request $request)
    {
        $id_usuario = auth()->user()->id;
        $id_destino = session()->get('id_destino');

        $registro = ChatRepository::registro($id_usuario, $id_destino);

        $mensagens = chat::where('registro_conversa', '=', $registro[0])->orWhere('registro_conversa', '=', $registro[1])->orderBy('id')->get();

        return view('chat.dados_chat', ["mensagens" => $mensagens, "registro_conversa1" => $registro[0], "registro_conversa2" => $registro[1]]);
    }

    public function filtro_contato(Request $request)
    {
        $id = auth()->user()->id;   
        
        $dadosUsuario = UserRepository::find($id);

        $filtro = $request->all();

        $dados = User::where([['id', '!=', $id], ['tipo_usuario', '=', $filtro['tipo_usuario']], ['esporte', '=', $filtro['esporte']], ['sexo', '=', $filtro['sexo']]])->get(); //Recebendo dados conforme o filtro do usuario

        return view('chat.contatos-chat',["dados" => $dados, "dadosUsuario" => $dadosUsuario]);
    }

}
