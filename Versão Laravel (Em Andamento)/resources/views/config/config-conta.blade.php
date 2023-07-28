@extends('layouts.esqueleto')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/style_home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_config.css') }}">
@endsection

@section('conteudo')
    <main>
        <div class="container">
            <div class="row">
                @include('config.layouts.nav-config')

                <section class="col-md-9">
                    <h1 class="text-title">Configuração de Conta</h1>
                    <p class="text">Essas informações facilitarão as buscas dos times da sua regiões.</p>
                    <form name="config_conta" method="POST" action="{{route('config_update_conta')}}" id="altera_form">
                        @csrf
                        <div form="form-group">
                            <label for="email">
                                Endereço de e-mail
                            </label>
                            <input class="form-control" type="email" name="email" value="{{$dadosUsuario['email']}}">
                        </div>

                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Sexo</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexo" id="masculino"
                                            value="masculino" @if($dadosUsuario['sexo'] == 'masculino')
                                                checked
                                            @endif>
                                        <label for='masculino'>
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexo" id="feminino"
                                            value="femenino" @if($dadosUsuario['sexo'] == 'femenino')
                                                checked
                                            @endif>
                                        <label for="feminino">
                                            Feminino
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexo" id="indefinido"
                                            value="" @if($dadosUsuario['sexo'] == null)
                                                checked
                                            @endif>
                                        <label for="indefinido">
                                            Indefinido
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <label for="data_n">
                                Data de Nascimento
                            </label>
                            <input class="form-control" type="date" name="data_n" id="data_n"
                                value="{{$dadosUsuario['data_nascimento']}}" />
                        </div>

                        @if ($dadosUsuario['tipo_usuario'] == 'jogador')
                            <label for="preco">
                                Preço de Contrato
                            </label>

                            <input id="preco" type="number" name="preco" min="0" step="0.01"
                                data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency"
                                value="{{$dadosUsuario['preco']}}">
                        @endif

                        @if (!empty($time) || !empty($jogador))
                            <fieldset class="form-group" disabled="disabled">
                            @else
                                <fieldset class="form-group">
                        @endif

                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">
                                @switch($dadosUsuario['sexo'])
                                    @case('masculino')
                                        Tipo de Usuário
                                    @break

                                    @case('femenino')
                                        Tipo de Usuária
                                    @break

                                    @default
                                        Tipo de Usuárix
                                @endswitch
                            </legend>

                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="jogador"
                                        value="jogador" @if($dadosUsuario['tipo_usuario'] == 'jogador')
                                                checked
                                            @endif>
                                    <label for='jogador'>
                                        @switch($dadosUsuario['sexo'])
                                            @case('masculino')
                                                Jogador
                                            @break

                                            @case('femenino')
                                                Jogadora
                                            @break

                                            @default
                                                Jogadorx
                                        @endswitch
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="adm"
                                        value="administrador_time" @if($dadosUsuario['tipo_usuario'] == 'administrador_time')
                                                checked
                                            @endif>
                                    <label for="adm">
                                        @switch($dadosUsuario['sexo'])
                                            @case('masculino')
                                                Administrador de um time
                                            @break

                                            @case('femenino')
                                                Administradora de um tim
                                            @break

                                            @default
                                                Administradorx de um tim
                                        @endswitch
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="analista"
                                        value="analisador" @if($dadosUsuario['tipo_usuario'] == 'analisador')
                                                checked
                                            @endif>
                                    <label for="analista">
                                        Analista
                                    </label>
                                </div>
                            </div>
                        </div>
                        </fieldset>

                        <button class="btn btn-light" type="button" data-toggle="modal" data-target="	#alterar_senha">
                            Alterar Senha
                        </button>

                        <button class="btn btn-light" type="button" name="salvar" data-toggle="modal"
                            data-target="#alterar_usuario">
                            Salvar Alterações
                        </button>

                        <a href="{{ route('perfil') }}">
                            <button class="btn btn-danger" type="button">Cancelar</button>
                        </a>

                        @if($time || $jogador)
                            <a href="#">
                                <button class="btn btn-danger" data-toggle="modal" data-target="#excluir_time">Excluir
                                    Conta</button>
                            </a>
                        @else
                            <a href="{{route('config_delete_conta')}}">
                                <button class="btn btn-danger" type="button">Excluir Conta</button>
                            </a>
                        @endif
                </section>
            </div>
        </div>

        <!--Modal-Confirmação_de_Senha-->
        <div class="modal fade" id="alterar_usuario" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confime sua Senha</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section class="tudo-box">
                            <label for="senha">
                                Senha
                            </label>
                            <input id="senha" type="password" name="senha" placeholder="******" />
                            <span class='erro-validacao template msg-senha'>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal-Alteração_Senha-->
        <div class="modal fade" id="alterar_senha" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Altere sua Senha</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form name="altera_senha" method="POST" action="{{route('config_update_conta_senha')}}" id="altera_senha">
                        @csrf
                        <div class="modal-body">
                            <section class="tudo-box">
                                <label for="senha_a">
                                    Senha antiga
                                </label>
                                <input id="senha_a" type="password" name="senha_a" placeholder="******">
                                <span class='erro-validacao template msg-senha_a'></span>
                            </section>

                            <section class="tudo-box">
                                <label for="senha_n">
                                    Senha Nova
                                </label>
                                <input id="senha_n" type="password" name="senha_n" placeholder="******" />
                                <span class='erro-validacao template msg-senha_n'></span>
                            </section>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" name="alterar_senha" value="Alterar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Modal-Senha-Incorreta -->
        <section>
            <div class="modal fade" id="senha_incorreta" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Senha Incorreta</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Modal-Alterações_Completas-->
        <section>
            <div class="modal fade" id="alteracao_completa" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Alterações Completas</h5>
                        </div>
                        <div class="modal-footer">
                            <a href="perfil.php">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#completa">OK</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Modal-Exclusão_de_time-->
        <div class="modal fade" id="excluir_time" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">AVISO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @switch($dadosUsuario['tipo_usuario'])
                            @case('jogador')
                                Vimos que você ainda está em um ou vários times, para trocar excluir a sua conta é necessário sair
                                dos times em que você está!
                            @break

                            @case('administrador_time')
                                Vimos que você tem um time aberto, para excluir a sua conta é necessário fecha-lo!
                            @break

                            @default
                        @endswitch
                    </div>
                    <form name="excluir" method="POST" action="#">
                        <div class="modal-footer">
                            <button type="button" name="ok" class="btn btn-primary"
                                data-dismiss="modal">OK</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!--scripts-->
    <script type="text/javascript" src="{{asset('js/alterar.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/alterar_senha.js')}}"></script>
@endsection