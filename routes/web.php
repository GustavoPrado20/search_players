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

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/configuração', function(){
    Route::get('/perfil', [App\Http\Controllers\ConfigPerfilController::class, ''])->name('config_perfil');
    Route::get('/conta', [App\Http\Controllers\ConfigContaController::class, ''])->name('config_conta');
    Route::get('/localização', [App\Http\Controllers\ConfigLocalizacaoController::class, ''])->name('config_localizacao');
    Route::get('/time', [App\Http\Controllers\ConfigTimeController::class, ''])->name('config_time');
});

Route::get('/perfil', [App\Http\Controllers\PerfilController::class, ''])->name('perfil');

Route::get('/times', [App\Http\Controllers\TimesController::class, ''])->name('times');

Route::get('/times/meu_time', [App\Http\Controllers\MeuTimeController::class, ''])->name('meu_time');

Route::get('/jogadores', [App\Http\Controllers\jogadoresController::class, ''])->name('jogadores');

Route::get('/campeonato', [App\Http\Controllers\CampeonatosController::class, ''])->name('campeonatos');

Route::get('/partidas', [App\Http\Controllers\PartidasController::class, ''])->name('partidas');

Route::get('/ranking', [App\Http\Controllers\RankingController::class, ''])->name('ranking');

Route::prefix('/conversa', function(){
    Route::get('/contatos', [App\Http\Controllers\ChatController::class, ''])->name('contatos');
    Route::get('/chat', [App\Http\Controllers\ChatController::class, ''])->name('chat');
    Route::get('/chat_time', [App\Http\Controllers\ChatController::class, ''])->name('chat_time');
});

