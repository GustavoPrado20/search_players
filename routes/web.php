<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controllers\IndexController::class, 'Index'])->name('index');

Route::post('/', [Controllers\IndexController::class, 'logar'])->name('logar');

Route::post('/registrar', [Controllers\IndexController::class, 'registrar'])->name('registrar-usuario');

Route::get('/home', [Controllers\HomeController::class, 'Index'])->name('home');

Route::get('/logout', [Controllers\HomeController::class, 'destroy'])->name('logout');


/*
Route::prefix('/configuração')->group(function(){
    Route::get('/perfil', [Controllers\ConfiguracaoController::class, 'config_perfil'])->name('config_perfil');
    Route::get('/conta', [Controllers\ConfiguracaoController::class, 'config_conta'])->name('config_conta');
    Route::get('/localização', [Controllers\ConfiguracaoController::class, 'config_localizacao'])->name('config_localizacao');
    Route::get('/time', [Controllers\ConfiguracaoController::class, 'config_time'])->name('config_time');
});

Route::get('/perfil', [Controllers\PerfilController::class, ''])->name('perfil');

Route::get('/times', [Controllers\TimeController::class, ''])->name('times');

Route::get('/times/meu_time', [Controllers\MeuTimeController::class, ''])->name('meu_time');

Route::get('/jogadores', [Controllers\jogadoresController::class, ''])->name('jogadores');

Route::get('/campeonato', [Controllers\CampeonatoController::class, ''])->name('campeonatos');

Route::get('/partidas', [Controllers\PartidaController::class, ''])->name('partidas');

Route::get('/ranking', [Controllers\RankingController::class, ''])->name('ranking');

Route::prefix('/conversa')->group(function(){
    Route::get('/contatos', [Controllers\ChatController::class, ''])->name('contatos');
    Route::get('/chat', [Controllers\ChatController::class, ''])->name('chat');
    Route::get('/chat_time', [Controllers\ChatController::class, ''])->name('chat_time');
});

//Metodos POST
Route::post('/registrar', [Controllers\IndexController::class, 'registrar'])->name('registrar');
Route::post('/', [Controllers\IndexController::class, 'login'])->name('login');
*/

Route::get('/termos', [Controllers\TermosController::class, ''])->name('termos');