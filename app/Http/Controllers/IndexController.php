<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\StoreIndexRequest;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }

    public function create(){

    }

    public function store(StoreIndexRequest $request){
        $data = $request->validated();

        $registrar = UserRepository::create($data);

        if(!$registrar){
            return view('index');
        }

        return view('home');
    }

    public function show(){

    }

    public function edit(){
    
    }

    public function update(){
    
    }

    public function destroy(){

    }

}
