@extends('layouts.esqueleto')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/style_perfil.css') }}">
@endsection

@section('conteudo')
    <main>
        @empty($dadosUsuario)
            <section class="mx-auto" style="width: 400px;">
                <img class="ausencia_img" style="width: 400px;" src="./img/perfil_ausente">
            </section>
            <h5 class="text_mensagem text-center">
                Desculpe... Dados do perfil não encontrados.
            </h5>
        @endempty

        <section class="d-flex align-items-center flex-column">
            <section class="container" style="width : 820px">
                <figure>
                    @empty($dadosUsuario['banner'])
                        <img class="banner d-block" src="{{ asset('img/banners_perfis/banner_usuario.jpeg') }}"
                            alt="Banner do Usuário">
                    @endempty
                    <img class="banner d-block" src="{{ asset('img/banners_perfis/' . $dadosUsuario['banner']) }}"
                        alt="Banner do Usuário">
                </figure>

                <section class="row">
                    <section class="col-md-4">
                        <figure>
                            @if (empty($dadosUsuario['foto']))
                                @if (empty($dado['sexo']) || $dado['sexo'] == 'masculino' || null)
                                    <img class="foto_media" src="{{ asset('img/foto_perfis/user_m.svg') }}"
                                        alt="Imagem do Usuário">
                                @else
                                    <img class="foto_media" src="{{ asset('img/foto_perfis/user_f.svg') }}"
                                        alt="Imagem do Usuário">
                                @endif
                            @else
                                <img class="foto_media rounded-circle"
                                    src="{{ asset('img/foto_perfis/' . $dadosUsuario['foto']) }}" alt="Imagem do usuário">
                            @endif
                        </figure>

                        <h3 class="titulo">
                            {{ ucwords($dadosUsuario['nome']) }}
                            <a class="icon" href="config_perfil.php">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </h3>
                    </section>

                    @switch($dadosUsuario['tipo_usuario'])
                        @case('jogador')
                            @switch($dadosUsuario['sexo'])
                                @case('masculino')
                                    <section class="col-md-4">
                                        <p class="text_mensagem">Jogador</p>
                                @break

                                @case('femenino')
                                    <section class="col-md-4">
                                        <p class="text_mensagem">Jogadora</p>
                                @break

                                @default
                                    <section class="col-md-4">
                                        <p class="text_mensagem">Jogadorx</p>
                            @endswitch

                            @if (isset($endereco['cidade']))
                                <p class="text_mensagem">{{ $endereco['cidade'] }} - {{ $endereco['estado'] }}</p>
                            @endif

                            @if ($dadosUsuario['preco'])
                                <p class="text_mensagem">R$: {{ $dadosUsuario['preco'] }}</p>
                            @endif

                            @empty($dadosUsuario['esporte'])
                                <p class="text_mensagem"></p>
                                </section>
                            @endempty

                                <p class="text_mensagem">Ranking:
                                    @if (isset($dadosUsuario['pontos']))
                                        {{ $dadosUsuario['pontos'] }} pts
                                    @else
                                        0 pts 
                                    @endif
                                </p>
                            </section>

                            <section class="col-md-4">
                                @if (isset($dadosUsuario['esporte']))
                                    <p class="text_mensagem">Esporte:
                                        @switch($dadosUsuario['esporte'])
                                            @case('futebol')
                                                Futebol
                                            @break

                                            @case('basquete')
                                                Basquete
                                            @break

                                            @default
                                                Volei
                                        @endswitch
                                @else
                                    Sem Esporte
                                @endif
                                </p>
                        @break

                        @case('administrador_time')
                            <section class="col-md-4">
                                <p class="text-mensagem">Contratante</p>

                                @if (isset($endereco['cidade']))
                                    <p class="text_mensagem">{{ $endereco['cidade'] }} - {{ $endereco['estado'] }}</p>
                                @endif

                                <p class="text-mensagem">
                                    @if (!empty($times))
                                        Time: {{ $times['nome'] }}
                                    @endif
                                    Você ainda não tem um time!
                                </p>

                                <p class="text_mensagem">Ranking:
                                    @if (isset($dadosUsuario['pontos']))
                                        {{ $dadosUsuario['pontos'] }} pts
                                    @else
                                        0 pts 
                                    @endif
                                </p>
                            </section>

                            <section class = "col-md-4">
                                @if(isset($dadosUsuario['esporte']))
                                    <p class = "text_mensagem">Esporte:
                                        @switch($dadosUsuario['esporte'])
                                            @case('futebol')
                                                Futebol
                                            @break

                                            @case('basquete')
                                                Basquete
                                            @break

                                            @default
                                                Volei
                                        @endswitch
                                @else
                                    Sem Esporte    
                                @endif
                                </p>
                            </section>                                    
                        @break

                        @case($dadosUsuario['analisador'])
                            <section class = "col-md-4">
                                <p class = "text_mensagem">Analisador</p>
                                @if(isset($endereco['cidade']))
                                    <p class="text_mensagem">{{ $endereco['cidade'] }} - {{ $endereco['estado'] }}</p>
                                @endif
                            </section>
                        @break

                        @default
                            Esse tipo de Usuario não Existe!!
                    @endswitch

                    <p class="text_mensagem">Sexo:
                        @switch($dadosUsuario['sexo'])
                            @case('masculino')
                                Masculino
                            @break
                            
                            @case('femenino')
                                Femenino
                            @break
                            
                            @default
                                Indefinido
                        @endswitch    
				    </p>

                    <p class="text_mensagem">
                        @if(isset($dadosUsuario['data_nascimento']))
                            {{$data->format( '%Y anos' )}}	
                        @endif						
                    </p>

                    <p class="text_mensagem">
                        @if(isset($dadosUsuario['site']))
                            <a target="_blank" href="{{$dadosUsuario['site']}}">
                                {{$dadosUsuario['site']}}
                            </a>
                        @endif
					</p>
                </section>
            </section>
        </section>
            <sectio class = "status">
                @if(!empty($dadosUsuario['sobre']))
                    {{$dadosUsuario['sobre']}}
                @endif
            </section>
        </section>
    </main>
@endsection
