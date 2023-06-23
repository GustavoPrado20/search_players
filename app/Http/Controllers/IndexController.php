<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }



    public function registrar(Request $request){
        $usuario = new User();

        $usuario->fill($request->all());

        $usuario->save();

        return view('index');
    }
}
