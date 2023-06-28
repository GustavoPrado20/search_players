<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\StoreIndexRequest;
use App\Http\Requests\UpdateIndexRequest;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }

    public function registrar(StoreIndexRequest $request){
        $datavalidat = $request->validated();

        $data = ['nome' => $datavalidat['nome']. ' ' . $datavalidat['sobrenome'], 'email' => $datavalidat['email'], 'password' => $datavalidat['password'], 'tipo_usuario' => $datavalidat['tipo_usuario']];

        $registrar = UserRepository::create($data);

        if($registrar){
            $credenciais = $request->only('email', 'password');

            if(Auth::attempt($credenciais)){
                $request->session()->regenerate();

                return redirect()->intended('home');
            }
        }
    }

    public function logar(UpdateIndexRequest $request){
        $data = $request->validated();

        if(Auth::attempt($data)){
            $request->session()->regenerate();

            return redirect()->intended('home');
        }
        else{
            $erroLogin = 'Email ou Senha Incorretos!!!';
            return view('index',['erroLogin' => $erroLogin]);
        }
        
    }

}
