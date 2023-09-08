<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracaoTimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
    }
}
