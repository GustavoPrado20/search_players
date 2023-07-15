@extends('layouts.esqueleto')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/style_home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_meutime.css') }}">
@endsection

@section('conteudo')
    <main style="margin-top:200px;">
        <h5 class="titulo text-center">
            Deseja mesmo excluir sua conta? Todos os seus dados seram excluidos junto a ela.
        </h5>
        <section class="botoes mx-auto" style="width:160px; margin-top:50px;">
            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#formulario">Sim</a>
            <a href="{{route('config_conta')}}">
                <button class="btn btn-danger" type="button">
                    Não
                </button>
            </a>
        </section>

        <!--Modal-FormularioOpiniao-->
        <section>
            <div class="modal fade" id="formulario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Por que está deixando nossa plataforma ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <form id="cadastre-form" name="form" method="POST" action="{{route('config_delete_conta_confirm')}}">
                                    @csrf
                                    <div>
                                        <section>
                                            <input id="problema1" type="radio" name="problema"
                                                value="Problemas_Técnicos_na_Plataforma">
                                            <label for="problema1">
                                                Problemas Técnicos na Plataforma;
                                            </label>
                                        </section>

                                        <section>
                                            <input id="problema2" type="radio" name="problema"
                                                value="Visual_Não_Muito_Atraente" />
                                            <label for="problema2">
                                                Visual Não Muito Atraente;
                                            </label>
                                        </section>

                                        <section>
                                            <input id="problema3" type="radio" name="problema"
                                                value="Não_Fiquei_Satisfeito(a)_Com_o_Serviço">

                                            <label for="problema3">
                                                Não Fiquei Satisfeito(a) Com o Serviço;
                                            </label>
                                        </section>

                                        <section>
                                            <input id="problema4" type="radio" name="problema"
                                                value="Incoveniente_Com_Algumx_Usuárix">
                                            <label for="problema4">
                                                Incoveniente Com Algums Usuários;
                                            </label>
                                        </section>

                                        <section>
                                            <input id="problema5" type="radio" name="problema"
                                                value="Prefiro_Não_Comentar">
                                            <label for="problema5">
                                                Prefiro Não Comentar.
                                            </label>
                                        </section>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Fechar</button>
                                <input type="submit" name="excluir" value="Excluir a Conta"
                                    class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </main>
@endsection