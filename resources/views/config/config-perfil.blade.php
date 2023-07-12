@extends('layouts.esqueleto')

@section('estilos')
    <link rel="stylesheet" href="{{asset('css/style_home.css')}}">
    <link rel="stylesheet" href="{{asset('css/config.css')}}">
@endsection

@section('conteudo')
    <main>
        <div class="container">
			<div class="row">
				@include('config.layouts.nav-config')

				<section class="col-md-9">
					<h1 class="text-title">Editar Perfil</h1>
					<p class="text">As seguintes informações estaram amostra em seu perfil para outros usuários</p>
					<form name="editar" method="POST" action="#" id="altera_form" enctype="multipart/form-data">

						<div class="form-group">
							<div class="input-group mb-3">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="foto" name="foto" aria-describedby="inputGroupFileAddon03">
									<label class="custom-file-label" for="foto">Adicione uma foto de perfil</label>
									</div>
							</div>

							<figure>
								@if(empty($dadosUsuario['foto']))
									@if(empty($dadosUsuario['sexo']) || $dadosUsuario['sexo'] == 'masculino' || $dadosUsuario['sexo'] == null)
										<img class="foto_media" src="{{ asset('img/foto_perfis/user_m.svg') }}" alt="Imagem do Usuário">
									@else
										<img class="foto_media" src="{{ asset('img/foto_perfis/user_f.svg') }}" alt="Imagem do Usuário">
									@endif
								@endif
								<img class="foto_media rounded-circle" src="{{ asset('img/foto_perfis/'.$dadosUsuario['foto']) }}" alt="Imagem do usuário">
							</figure>

							@if(!empty($dadosUsuario['foto']))
								<a href="retira_foto.php">
									<button class="btn btn-danger" type="button">
										Retirar Foto
									</button>
								</a>
							@endif
						</div>

						<div class="form-group">
							<div class="input-group mb-3">
								<div class="custom-file">
									<input type="file" name="banner" class="custom-file-input" id="banner" name="foto" aria-describedby="inputGroupFileAddon03">
									<label class="custom-file-label" for="banner">Adicione um banner</label>
									</div>
							</div>
							<figure>
								@if(empty($dadosUsuario['banner']))
									<img class="banner d-block" src="{{ asset('img/banners_perfis/banner_usuario.jpeg') }}" alt="Banner do Usuário">
								@else
									<img class="banner d-block" src="{{ asset('img/banners_perfis/'.$dadosUsuario['banner']) }}" alt="Banner do Usuário">
								@endif
							</figure>

							@if(!empty($dadosUsuario['banner']))
								<a href="retira_banner.php">
									<button  class="btn btn-danger" type="button">
										Retirar Banner
									</button>
								</a>
							@endif
						</div>

						<div class="form-group row">
							<div class="col-md-6">
								<label for="nome">
									Nome
								</label>
								<input class="form-control" type="text" name="nome" value="{{ ucwords($dadosUsuario['nome'])}}">
							</div>
						</div>

						<div class="form-group">
							<label for="status">
								Status
							</label>
							<textarea class="form-control" style="resize: none" id="status" name="sobre" row="3">{{ $dadosUsuario['sobre'] }}</textarea>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="site">
									Site
								</label>
								<input class="form-control" type="text" name="site" id="site" value="{{ $dadosUsuario['site'] }}">
							</div>
							<div class="col-md-6">
								<label for="esporte">
									Esporte 
								</label>
								@if(!empty($time) or !empty($jogador))
									<select class="custom-select" name="esporte" disabled="disabled">
								@else
									<select class="custom-select" name="esporte">
								@endif
									@if(empty($dadosUsuario['esporte']))
										<option value=""></option>
									@endif
					
									<option value="futebol" {{ @if($dadosUsuario['esporte'] == 'futebol') selected @endif}}>Futebol</option>
									<option value="basquete" {{ @if($dadosUsuario['esporte'] == 'basquete') selected @endif}}>Basquete</option>
									<option value="volei" {{ @if($dadosUsuario['esporte'] == 'volei') selected @endif}}>Vôlei</option>
								</select>
							</div>
						</div>

						<button class="btn btn-light" type="button" name="salvar" data-toggle="modal" data-target="#alterar_usuario">
							Salvar Alterações
						</button>
						<a href="perfil.php">
							<button class="btn btn-danger" type="button">Cancelar</button> 
						</a>

				</section>
			</div>	
		</div>

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
							<a href="perfil.php">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#completa">OK</button>
							</a>
						</div>
					</div>
				</div>
			</div>						
		</section>
    </main>
@endsection