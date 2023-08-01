<script type="text/javascript" src="{{asset('js/localizacao.js')}}"></script>
@extends('config.config-localizacao')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/style_home.css') }}">    
    <link rel="stylesheet" href="{{ asset('css/style_config.css') }}">
@endsection

@section('conteudo')
    <div class="container">
        <div class="row">
            @include('config.layouts.nav-config')
            <section class="col-md-9">
                <h1 class="text-title">Localizacão</h1>
                <p class="text">Aqui você pode configurar sua localização de atuação, melhorando a forma de encontrar jogos, times e jogadores perto de sua casa.</p>
                <form method="POST" action="#" id="altera_form" name="confima_senha">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="cep">
                                CEP
                            </label>
                            <input class="form-control" name="cep" type="text" id="cep" size=10 placeholder="CEP" maxlength="9" onblur="pesquisacep(this.value);" value= @if(isset($endereco['cep'])) {{$endereco['cep']}} @endif>
                        </div>
                        <div  class="col-sm-6">
                            <label for="uf">
                                Estado
                            </label>
                            <select class="form-control" id="uf" name="uf">
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="cidade">
                                Cidade
                            </label>
                            <input class="form-control" name="cidade" type="text" id="cidade" placeholder="Cidade" size="40" value= @if(isset($endereco['cidade'])) {{$endereco['cidade']}} @endif>
                        </div>
                        <div class="col-sm-6">
                            <label for="bairro">
                                Bairro
                            </label>
                            <input class="form-control" name="bairro" type="text" id="bairro" placeholder="Bairro" size="40" value= @if(isset($endereco['bairro'])) {{$endereco['bairro']}} @endif>
                        </div>
                    </div>
                    <button class="btn btn-light" type="button" name="salvar" data-toggle="modal" data-target="#alterar_usuario">
                        Salvar Alterações
                    </button>

                    <a href="{{route('perfil')}}">
                        <button class="btn btn-danger" type="button">Cancelar</button> 
                    </a>
                

                    <!--Modal-Confirmação_de_Senha-->
                    <div class="modal fade" id="alterar_usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <input id="senha" type="password" name="senha" placeholder="******"/>
                                            <span class='erro-validacao template msg-senha'>
                                        </form>
                                    </section>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>

            <!--Modal-Senha-Incorreta -->
            <section>
                <div class="modal fade" id="senha_incorreta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <div class="modal fade" id="alteracao_completa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Alterações Completas</h5>
                            </div>							     
                            <div class="modal-footer">
                                <a href="{{route('perfil')}}">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#completa">OK</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>				
        </div>
    </div>
@endsection