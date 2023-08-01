@extends('layouts.esqueleto')

@section('estilos')
    <link rel = "stylesheet" href = "{{asset('css/style_chat.css')}}">
    <link rel = "stylesheet" href = "{{asset('css/style_meutime.css')}}">
@endsection

@section('scripts')
    <script type = "text/javascript" src = "{{asset('js/chat.js')}}"></script>
@endsection

@section('conteudo')
    <main class="container">
        <a class="left_contatos" href="{{route('contatos')}}">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
        </a>

        <section class="chat-container mx-auto">
            <section class="contatos">
                @if(!empty($dadosDestino))
                    {{-- foto do Usuario de destino --}}
                    @if(empty($dadosDestino['foto']))
                        @if(empty($dadosDestino['sexo']) || $dadosDestino['sexo'] == 'masculino')
                            <img class = "foto_chat" src = "{{asset('img/foto_perfis/user_m.svg')}}" alt = "Imagem do Usuario">
                        @else
                            <img class = "foto_chat" src = "{{asset('img/foto_perfis/user_f.svg')}}" alt = "imagem da Usuaria">
                        @endif
                    @else
                        <img class = "foto_chat" src = "{{asset('img/foto_perfis/'.$dadosDestino['foto'])}}" alt = "imagem da Usuaria">
                    @endif
                    {{-- Nome do usuario de Destino --}}
                    <h4 class = "nome_contato">
                        {{ucwords($dadosDestino['nome'])}}
                    </h4>
                @endif
            </section>

            <section class="chat scrollbar-chat" id="chat">
                    
            </section>
            <form class="form_chat" method="POST" action="{{route('registro_chat')}}">
                @csrf
                <input type="hidden" name="nome" placeholder="Seu Nome" value="{{ucwords($dadosUsuario['nome'])}}">
                <input type = "hidden" name = "id_destino" value = "{{$id_destino}}">
                <section class="txt_box">
                    <textarea class="txt_chat scrollbar-warning" name="mensagem" placeholder="Escreva Aqui..." row="1" required/></textarea>
                </section>
                <button class="chat_btn" type="submit" name="enviar_conversa" value="Enviar"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-11.5.5a.5.5 0 0 1 0-1h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5z"/>
                    </svg>
                </button>
            </form>
        </section>
    </main>
@endsection