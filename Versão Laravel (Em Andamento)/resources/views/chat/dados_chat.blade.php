@empty($mensagens)
    sem mensagem
@endempty

@foreach ($mensagens as $mensagem)
    <section id = "dados-chat">
        @php
            $hiperlink = ltrim($mensagem['mensagem'], 'https://');
            $hiperlink2 = ('https://'.$hiperlink);

            $hora = substr($mensagem['created_at'], 11,8);
        @endphp

        @if($mensagem['registro_conversa'] == $registro_conversa1)
            <section class = "container_chat usuario">
                <section class = "box_chat">
                    <span class = "mensagem text-break">
                        @if($hiperlink2 == $mensagem['mensagem'])
                            <a target = "_blank" href = "{{$mensagem['mensagem'];}}">
                                {{$mensagem['mensagem'];}}
                            </a>
                        @else
                            {{$mensagem['mensagem'];}}
                        @endif
                    </span>

                    <section class = "container_hora">
                        <span>
                            <a href = "{{route('delete-mensagem',['id' => $mensagem['id']])}}">&times;</a>
                        </span>
                        <time class = "hora">
                            {{ $hora }}
                        </time>
                    </section>
                </section>
            </section>
        @elseif($mensagem['registro_conversa'] == $registro_conversa2)
            <section class = "container_chat estrangeiro">
                <section class = "box_chat">
                    @if(!empty($mensagem['link']))
                        <a href = "{{$mensagem['link'];}}">
                    @endif

                    <span class = "mensagem text-break">
                        @if($hiperlink2 == $mensagem['mensagem'])
                            <a target = "_blank" href = "{{$mensagem['mensagem'];}}">
                                {{$mensagem['mensagem'];}}
                            </a>
                        @else
                            {{$mensagem['mensagem'];}}
                        @endif
                    </span>
                    
                    <section class = "container_hora">
                        <span>
                            <a href = "{{route('delete-mensagem',['id' => $mensagem['id']])}}">&times;</a>
                        </span>
                        <time class = "hora">
                            {{ $hora }}
                        </time>
                    </section>
                </section>
            </section>
        @endif
    </section>
@endforeach