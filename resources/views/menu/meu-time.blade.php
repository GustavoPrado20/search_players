@extends('layouts.esqueleto')

@section('estilos')
    <link rel = "stylesheet" href = "{{asset('css/style_home.css')}}">
    <link rel = "stylesheet" href = "{{asset('css/style_meutime.css')}}">
@endsection

@section('conteudo')
    <main>
        @if(!empty($dadosTime))
            <section class = "d-flex align-items-center flex-column">
                @if(empty($dadosTime['brasao_time']))
                    <img class="foto_media" src="{{asset('img/foto_time/brasao.svg')}}" alt="Imagem do Usuário">
                @else
                    <img class="foto_media rounded-circle" src="{{asset('img/foto_time/'.$dadosTime['brasao_time'])}}" alt="Imagem do usuário">
                @endif

                <h5 class = "titulo">
                    {{$dadosTime['nome']}}

                    <a class = "icon" href = "config_time.php">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </h5>

                <section class="card mb-3 mx-auto" style="width:600px; padding:10px; background-color:#222;">
                    <p style="text-align:center;" class="text_mensagem text-break">
                        Esporte:
                        @switch($dadosTime['esporte'])
                            @case('futebol')
                                Futebol
                            @break

                            @case('basquete')
                                Basquete
                            @break
                        
                            @default
                                Volei
                        @endswitch
                    </p>

                    @if(!empty($dadosTime['lema']))
                        <p style="font-style:italic; text-align:center;" class="text_mensagem text-break">
                            {{$dadosTime['lema']}}
                        </p>
                    @endif

                    <p style="text-align:center;" class="text_mensagem text-break">
                        @if(isset($enderecoTime['cep']))
                            {{$enderecoTime['cidade'].' - '.$enderecoTime['estado']}}
                            {{$enderecoTime['rua'].' N° '.$enderecoTime['numero']}}                        
                        @endif
                    </p>
                </section>

                <form name="chat_time" method="POST" action="registrochat_time.php">
                    @csrf
                    <input type="hidden" name="id_time" value="{{$dadosTime['id']}}">

                    <button class="btn btn-danger" style="background-color:#ff6535;" type="submit" name="conversar_time">Chat do Time</button>
                    <a href="minhas_partidas.php">
                        <button class="btn btn-danger" style="background-color:#ff6535;"  type="button">
                            Minhas Partidas
                        </button>
                    </a>
                </form>
            </section>

            <section class = "container">
                @if($numeroJogadores > 0)
                    <h1 style="color:#ff3c00" > Jogadores Fixos {{$numeroJogadores}}</h1>

                    @foreach ($jogadoresTime as $jogador)
                        <a href="pagina_usuario.php?info=true&id_usuario=<?php echo($con_u['id_usuario']); ?>"> {{--! preciso arrumar --}}
                            <p class="text_mensagem">
                                @if(empty($Jogador['foto']))
                                    @if(empty($Jogador['sexo']) || $Jogador['sexo'] == 'masculino' || $Jogador['sexo'] == null)
                                        <img class="foto_media" src="{{asset('img/foto_perfis/user_m.svg')}}" alt="Imagem do Usuário">
                                    @else
                                        <img class="foto_media" src="{{asset('img/foto_perfis/user_f.svg')}}" alt="Imagem do Usuário">
                                    @endif
                                @else
                                    <img class="foto_media rounded-circle" src="{{asset('img/foto_perfis/'.$Jogador['foto'])}}" alt="Imagem do usuário">
                                @endif
                            </p>

                            <p class="text_mensagem">
                                {{ucwords($Jogador['nome'])}}
                            </p>
                        </a>
                    @endforeach
                @endif
            </section>
        @else
            <section class="d-flex align-items-center flex-column">
                <section class="mx-auto" style="width: 400px;">
                    <img class="ausencia_img" style="width: 400px;" src="{{asset('img/ausencia_dados.svg')}}">
                </section>

                @if(!empty($dadosUsuario['esporte']))
                    <p class="text-center text_mensagem">
                        Ops... Vimos que você ainda não tem um time, 
                            <a href="#" data-toggle="modal" data-target="#registrar-time">Clique aqui</a>
                        para fazer o cadastro de um!
                    </p>
                @else
                    <p class="text-center text_mensagem">
                        Ops... Vimos que você ainda não tem um esporte, escolha um nas 
                            <a href="{{route('config_perfil')}}">Configurações do Perfil</a>
                        !
                    </p>
                @endif
            </section>
        @endif

        <!-- Modal registrar-time -->
        <section class="modal fade" id="registrar-time" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <section class="modal-dialog">
                <section class="modal-content">
                    <section class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registrar Time</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </section>

                    <section class="modal-body">	
                        <form id="" name="form-time" method="POST" action="{{route('registrar_time')}}">
                            @csrf
                            <section class="form-group">
                                <label for="nome">
                                    Nome do Time
                                </label>
                                <input class="form-control" id="nome" name="nome" type="text" placeholder="Nome do time"><br>
                            </section>			

                            <section class="form-group">
                                <label for="lema">Lema do Time</label>
                                <textarea id="lema" class="form-control" name="lema" rows="3"></textarea>
                            </section>

                            <section class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                                <input type="submit" name="registrar" value="Registrar" class="btn btn-primary">
                            </section>	
                        </form>
                    </section>
                </section>
            </section>
        </section>
    </main>
@endsection