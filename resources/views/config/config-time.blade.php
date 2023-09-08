<script type="text/javascript">
	function limpa_cep(){
		document.getElementById('rua').value=("");
		document.getElementById('bairro').value=("");
		document.getElementById('cidade').value=("");
		document.getElementById('uf').value=("");
	}

	function meucallback(conteudo){
		if (!("erro" in conteudo)){
			 document.getElementById('rua').value=(conteudo.logradouro);
			document.getElementById('bairro').value=(conteudo.bairro);
			document.getElementById('cidade').value=(conteudo.localidade);
			document.getElementById('uf').value=(conteudo.uf);
		}else{
			limpa_cep();
			alert("CEP não encontrado.");
		}
	}

	function pesquisacep(valor) {
		var cep=valor.replace(/\D/g,'');

		if(cep!=""){
			var valicep=(/^[0-9]{8}$/);

			if(valicep.test(cep)) {
				document.getElementById('rua').value="Procurando...";
				document.getElementById('bairro').value="Procurando...";
				document.getElementById('cidade').value="Procurando...";
				document.getElementById('uf').value="Procurando...";

	            var script=document.createElement('script');

	            script.src='https://viacep.com.br/ws/'+ cep +'/json/?callback=meucallback';

	            document.body.appendChild(script);
			}else {
				limpa_cep();
				alert("Formato de CEP inválido.");
	        }
		}else {
			limpa_cep();
	    }
	}
</script>

@extends('layouts.esqueleto')

@section('estilos')
    <link rel = "stylesheet" href = "{{asset('css/style_home.css')}}">
    <link rel = "stylesheet" href = "{{asset('css/style_config.css')}}">
@endsection

@section('conteudo')
    <main>
        <section class = "container">
            <section class = "row">
                @include('config.layouts.nav-config')

                @if(!empty($time))
                    <section class = "col-md-9">
                        <h1 class = "text-title">Configurar Time</h1>
                        <p class = "text">As seguintes informações estaram amostra em seu perfil para outros usuários</p>

                        <form name = "editar" method = "POST" action = "#" id = "alterar_form" enctype = "multipart/form-data">
                            @csrf
                            <section class = "form-group">
                                <section class = "input-group mb-3">
                                    <section class = "custom-file">
                                        <input type = "file" class = "custom-file-input" id = "foto" name = "foto" aria-describedby = "inputGroupFileAddon03">
                                        <label class="custom-file-label" for="foto">
										    Adicione um Brasão
										</label>
                                    </section>
                                </section>

                                <figure>
                                    @if(empty($time['brasao_time']))
                                        <img class="foto_media" src="{{asset('img/foto_time/brasao.svg')}}" alt="Imagem do Usuário">
                                    @else
                                        <img class="foto_media rounded-circle" src="{{asset('img/foto_time/'.$time['brasao_time'])}}" alt="Imagem do usuário">
                                    @endif
                                </figure>

                                @if(!empty($time['brasao_time']))
                                    <a href="retira_foto_t.php">
                                        <button type="button" class="btn btn-danger">
                                            Retirar Foto
                                        </button>
                                    </a>
                                @endif
                            </section>

                            <section class = "form-group row">
                                <section class = "col-md-6">
                                    <label for = "nome">
                                        Nome
                                    <label>
                                    <input class="form-control" type="text" name="nome" value= "{{$time['nome']}}">
                                </section>
                            </section>

                            <section class="form-group">
                                <label for="lema">
                                    Lema
                                </label>
                                <textarea class="form-control" style="resize: none" id="lema" name="lema" row="3">{{$time['lema']}}</textarea>
                            </section>

                            <section class="form-group row">
                                <section class="col-sm-6">
                                    <label for="cep">
                                        CEP
                                    </label>
                                    <input class="form-control" name="cep" type="text" id="cep" size=10 placeholder="CEP" maxlength="9" onblur="pesquisacep(this.value);" value="@if(isset($endereco['cep'])) {{$endereco['cep']}} @endif">
                                </section>

                                <section class="col-sm-6">
                                    <label for="uf">
                                        Estado
                                    </label>
                                    <select class="form-control" id="uf" name="uf">
                                        <option value="AC" @if(!empty($endereco) && $endereco['estado']=="AC") selected @endif>Acre</option>
                                        <option value="AL" @if(!empty($endereco) && $endereco['estado']=="AL") selected @endif>Alagoas</option>
                                        <option value="AP" @if(!empty($endereco) && $endereco['estado']=="AP") selected @endif>Amapá</option>
                                        <option value="AM" @if(!empty($endereco) && $endereco['estado']=="AM") selected @endif>Amazonas</option>
                                        <option value="BA" @if(!empty($endereco) && $endereco['estado']=="BA") selected @endif>Bahia</option>
                                        <option value="CE" @if(!empty($endereco) && $endereco['estado']=="CE") selected @endif>Ceará</option>
                                        <option value="DF" @if(!empty($endereco) && $endereco['estado']=="DF") selected @endif>Distrito Federal</option>
                                        <option value="ES" @if(!empty($endereco) && $endereco['estado']=="ES") selected @endif>Espírito Santo</option>
                                        <option value="GO" @if(!empty($endereco) && $endereco['estado']=="GO") selected @endif>Goiás</option>
                                        <option value="MA" @if(!empty($endereco) && $endereco['estado']=="MA") selected @endif>Maranhão</option>
                                        <option value="MT" @if(!empty($endereco) && $endereco['estado']=="MT") selected @endif>Mato Grosso</option>
                                        <option value="MS" @if(!empty($endereco) && $endereco['estado']=="MS") selected @endif>Mato Grosso do Sul</option>
                                        <option value="MG" @if(!empty($endereco) && $endereco['estado']=="MG") selected @endif>Minas Gerais</option>
                                        <option value="PA" @if(!empty($endereco) && $endereco['estado']=="PA") selected @endif>Pará</option>
                                        <option value="PB" @if(!empty($endereco) && $endereco['estado']=="PB") selected @endif>Paraíba</option>
                                        <option value="PR" @if(!empty($endereco) && $endereco['estado']=="PR") selected @endif>Paraná</option>
                                        <option value="PE" @if(!empty($endereco) && $endereco['estado']=="PE") selected @endif>Pernambuco</option>
                                        <option value="PI" @if(!empty($endereco) && $endereco['estado']=="PI") selected @endif>Piauí</option>
                                        <option value="RJ" @if(!empty($endereco) && $endereco['estado']=="RJ") selected @endif>Rio de Janeiro</option>
                                        <option value="RN" @if(!empty($endereco) && $endereco['estado']=="RN") selected @endif>Rio Grande do Norte</option>
                                        <option value="RS" @if(!empty($endereco) && $endereco['estado']=="RS") selected @endif>Rio Grande do Sul</option>
                                        <option value="RO" @if(!empty($endereco) && $endereco['estado']=="RO") selected @endif>Rondônia</option>
                                        <option value="RR" @if(!empty($endereco) && $endereco['estado']=="RR") selected @endif>Roraima</option>
                                        <option value="SC" @if(!empty($endereco) && $endereco['estado']=="SC") selected @endif>Santa Catarina</option>
                                        <option value="SP" @if(!empty($endereco) && $endereco['estado']=="SP") selected @endif>São Paulo</option>
                                        <option value="SE" @if(!empty($endereco) && $endereco['estado']=="SE") selected @endif>Sergipe</option>
                                        <option value="TO" @if(!empty($endereco) && $endereco['estado']=="TO") selected @endif>Tocantins</option>
                                    </select>
                                </section>
                            </section>

                            <section class="form-group row">
                                <section class="col-sm-6">
                                    <label for="cidade">
                                        Cidade
                                    </label>
                                    <input class="form-control" name="cidade" type="text" id="cidade" placeholder="Cidade" size="40" value="@if(isset($endereco['cidade'])) {{$endereco['cidade']}} @endif">
                                </section>

                                <section class="col-sm-6">
                                    <label for="bairro">
                                        Bairro
                                    </label>
                                    <input class="form-control" name="bairro" type="text" id="bairro" placeholder="Bairro" size="40" value="@if(isset($endereco['bairro'])) {{$endereco['bairro']}} @endif">
                                </section>

                                <section class="col-sm-6">
                                    <label for="rua">
                                        Rua
                                    </label>
                                    <input class="form-control" name="rua" type="text" id="rua" placeholder="Rua" size="40" value="@if(isset($endereco['rua'])) {{$endereco['rua']}} @endif">
                                </section>

                                <section class="col-sm-6">
                                    <label for="numero">
                                        Nº							    
                                    </label>
                                    <input class="form-control" name="numero" type="text" id="numero" placeholder="Numero" size="40" value="@if(isset($endereco['numero'])) {{$endereco['numero']}} @endif" autocomplete = "no">
                                </section>
                            </section>

                            <button class="btn btn-light" type="button" name="salvar" data-toggle="modal" data-target="#alterar_usuario">
                                Salvar Alterações
                            </button>
                            <a href="{{route('meu_time')}}">
                                <button class="btn btn-danger" type="button">Cancelar</button> 
                            </a>

                            <a href="excluir_time">
                                <button class="btn btn-danger" type="button">Fechar Time</button>
                            </a>
                        </section>	
                @endif  
            </section>
        </section>

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
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <input type="submit" name="alterar" value="Alterar" class="btn btn-primary" data-toggle="modal" data-target="#resposta_alterar">
                    </form>
                    </div>
                </div>
            </div>
        </div>

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
                            <a href="{{route('meu_time')}}">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#completa">OK</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>						
        </section>
    </main>
@endsection