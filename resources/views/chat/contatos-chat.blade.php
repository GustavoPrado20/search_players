@extends('layouts.esqueleto');

@section('estilos')
    <link rel = "stylesheet" href = "{{asset('css/style_chat.css')}}">
    <link rel = "stylesheet" href = "{{asset('css/style_meutime.css')}}">
@endsection

@section('conteudo')
    <main>
        @include('layouts.botao-pesquisar')

        @include('layouts.modals.modal-filtro')

        @if(!empty($dados))
            @foreach($dados as $dado)
                <section class="card mb-3 mx-auto" style="max-width: 540px; background-color: #222;">
                    <section class="row no-gutters">
                        <section class="col-md-4">
                            <figure class="d-flex align-content-center mx-auto" style="width: 150px;">
                                @if(empty($dado['foto'])) <!- imagem caso o Usuario nao tenha adicionado nenhuma foto de perfil | Imaem padrao so sistema -->
                                    @if(empty($dado['sexo']) || $dado['sexo'] == 'masculino' || null)
                                        <img class = "user_img" src = "{{asset('img/foto_perfis/user_m.svg')}}" alt = "Imagem Usuario">
                                    @else
                                        <img class = "user_img" src = "{{asset('img/foto_perfis/user_f.svg')}}" alt = "Imagem Usuaria">
                                    @endif
                                @else
                                    <!- Foto de perfil adicionada pelo Usuario -->
                                    <img class = "user_img" src = "{{asset('img/foto_perfis/'.$dado['foto'])}}" alt = "Imagem Usuario">
                                @endif
                            </figure>
	    				</section>
	  					<section class="col-md-8">
						    <section class="card-body">
								<h5 class="titulo">
                                    {{ucwords($dado['nome'])}}
                                </h5>
                                @if($dado['sexo'] == 'masculino')
                                    <p class = "text_mensagem">Usuário:
                                    @switch($dado['tipo_usuario'])
                                        @case('jogador')
                                            Jogador de Aluguel
                                        @break

                                        @case('administrador_time')
                                            Administrador de Times
                                        @break

                                        @default
                                            Analisador de partidas
                                        @break
                                    @endswitch
                                    </p>
                                @elseif($dado['sexo'] == 'femenino')
                                    <p class = "text_mensagem">Usuária:
                                    @switch($dado['tipo_usuario'])
                                        @case('jogador')
                                            Jogadora de Aluguel
                                        @break

                                        @case('administrador_time')
                                            Administradora de Times
                                        @break

                                        @default
                                            Analisadora de partidas
                                        @break
                                    @endswitch
                                    </p>
                                @else
                                    <p class = "text_mensagem">Usuárix:
                                    @switch($dado['tipo_usuario'])
                                        @case('jogador')
                                            Jogadorx de Aluguel
                                        @break
                                        
                                        @case('administrador_time')
                                            Administradorx de Times
                                        @break

                                        @default
                                            Analisadorx de partidas
                                        @break
                                    @endswitch
                                    </p>
                                @endif
                                <form method="GET" action="{{route('chat')}}">
                                    @csrf
                                    <input type="hidden" name="id_destino" value = "{{$dado['id']}}">
                                    <input type="submit" name="conversar" value="Conversar" style="background-color:#ff3c00;" class="btn btn-danger">
                                </form>
                            </section>
                        </section>
                    </section>
                </section>
            @endforeach
        @else
            <section class="d-flex align-items-center flex-column">
                <section class="mx-auto" style="width: 400px;">
                    <img class="sem_pesquisa" style="width: 400px;" src="{{asset('img/sem_pesquisa.svg')}}">
                </section>
                <p class="text-center text_mensagem">
                    Nenhum resultado achado para essa pesquisa!
                </p>
            </section>
        @endif
    </main>
@endsection