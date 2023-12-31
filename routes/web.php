<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Controller;

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
Route::post('/logar', [Controllers\IndexController::class, 'logar'])->name('logar');
Route::post('/registrar', [Controllers\IndexController::class, 'registrar'])->name('registrar-usuario');

Route::get('/home', [Controllers\HomeController::class, 'Index'])->name('home');
Route::get('/notificacao', [Controllers\HomeController::class, 'notificacao'])->name('functions_notificacao');
Route::get('/logout', [Controllers\HomeController::class, 'destroy'])->name('logout');

Route::prefix('/conversas')->group(function(){
    Route::get('/contatos', [Controllers\ChatController::class, 'index'])->name('contatos');
    Route::get('/contatos/filtro', [Controllers\ChatController::class, 'filtro_contato'])->name('filtro_contato');

    Route::get('/chat', [Controllers\ChatController::class, 'chat'])->name('chat');
    Route::post('/chat', [Controllers\ChatController::class, 'registro_chat'])->name('registro_chat');
    Route::get('/dados', [Controllers\ChatController::class, 'dados_chat'])->name('dados_chat');
    
    Route::get('/chat_time', [Controllers\ChatController::class, 'chat_time'])->name('chat_time');

    Route::get('/pesquisa', [Controllers\ChatController::class, 'pesquisar'])->name('pesquisa_contato');

    Route::get('/chat/delete-mensagem/{id}', [Controllers\ChatController::class, 'delete_mensagem'])->name('delete-mensagem');
});

Route::get('/perfil', [Controllers\PerfilController::class, 'index'])->name('perfil');

Route::prefix('/configuração')->group(function(){
    Route::get('/perfil', [Controllers\ConfiguracaoPerfilController::class, 'index'])->name('config_perfil');
    Route::post('/perfil/update', [Controllers\ConfiguracaoPerfilController::class, 'updatePerfil'])->name('config_update_perfil');
    Route::get('/perfil/deleteFoto', [Controllers\ConfiguracaoPerfilController::class, 'deleteFoto'])->name('apagar_foto');
    Route::get('/perfil/deleteBanner', [Controllers\ConfiguracaoPerfilController::class, 'deleteBanner'])->name('apagar_banner');

    Route::get('/conta', [Controllers\ConfiguracaoContaController::class, 'index'])->name('config_conta');
    Route::post('/conta/update', [Controllers\ConfiguracaoContaController::class, 'updateConta'])->name('config_update_conta');
    Route::post('/conta/update/senha', [Controllers\ConfiguracaoContaController::class, 'updateSenha'])->name('config_update_conta_senha');
    Route::get('/conta/delete', [Controllers\ConfiguracaoContaController::class, 'deleteContaIndex'])->name('config_delete_conta');
    Route::post('/conta/delete/conta', [Controllers\ConfiguracaoContaController::class, 'deleteConta'])->name('config_delete_conta_confirm');

    Route::get('/localização', [Controllers\ConfiguracaoLocalizacaoController::class, 'index'])->name('config_localizacao');

    Route::get('/time', [Controllers\ConfiguracaoTimeController::class, 'index'])->name('config_time');
});

Route::prefix('/times')->group(function(){
    Route::get('/meu_time', [Controllers\MeuTimeController::class, 'index'])->name('meu_time');
    Route::post('/meu_time', [Controllers\MeuTimeController::class, 'registrarTime'])->name('registrar_time');
});



/*

Route::get('/times', [Controllers\TimeController::class, ''])->name('times');

Route::get('/jogadores', [Controllers\jogadoresController::class, ''])->name('jogadores');

Route::get('/campeonato', [Controllers\CampeonatoController::class, ''])->name('campeonatos');

Route::get('/partidas', [Controllers\PartidaController::class, ''])->name('partidas');

Route::get('/ranking', [Controllers\RankingController::class, ''])->name('ranking');
*/
Route::get('/termos', [Controllers\TermosController::class, ''])->name('termos');