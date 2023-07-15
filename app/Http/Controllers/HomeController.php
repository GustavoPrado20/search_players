<?php

namespace App\Http\Controllers;

use App\Repositories\NotificaRepository;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = auth()->user()->id;

        $dadosUsuario = UserRepository::find($id);

        return view('home',['dadosUsuario' => $dadosUsuario]);
    }

    public function notificacao(){
        $id = auth()->user()->id;
        
        $notificacao = NotificaRepository::findByIdDestino($id);

        if($notificacao->count() > 0){
            return '<a class = "dropdown-item" href = "'.$notificacao['link'].'">'.$notificacao['notificacao'].'</a>';
        }
        else{
            return '<span class = "dropdown-item">Sem Notificação</span>';
        }

    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
