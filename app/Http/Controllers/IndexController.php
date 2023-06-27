<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\StoreIndexRequest;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }

    public function registrar(StoreIndexRequest $request){
        $data = $request->validated();

        $registrar = UserRepository::create($data);

        if($registrar){
            $credenciais = $request->only('email', 'password');

            if(Auth::attempt($credenciais)){
                $request->session()->regenerate();

                return redirect()->intended('home');
            }
        }
    }

}
