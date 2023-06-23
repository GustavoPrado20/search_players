<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidacaoController extends Controller
{
    //Validação dos formularios login e registro
    public function validacao(Request $request){
        $regras = [
            'nome' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'password', 'min:8', 'confirmed'],
        ];

        $feedback = [
            //required
            'nome.required' => 'Preencha o campo Nome por favor!',
            'email.required' => 'Preencha o campo Email por favor!',
            'password.required' => 'Preencha o campo Senha por favor!',

            //email
            'email.email' => 'O email inserido nao corresponde a um formato de email valido!',

            //max e min
            'nome.max' => 'O campo nome ultrapassou o limite de caracteres!',
            'password.min' => 'Porfavor insira no minimo 8 caracteres!',

            //corfirmação
            'password.confirmed' => 'As senhas nao correspondem uma com a outra!',
        ];

        $request->validate($regras, $feedback);

        return redirect()->route('registrar');
    }
}
