@extends('layouts.esqueleto')

@section('estilos')
    <link rel="stylesheet" href="{{asset('css/style_home.css')}}">
    <link rel="stylesheet" href="{{asset('css/style_config.css')}}">
@endsection

@section('conteudo')
    <main>
        <section class="container">
			<section class="row">
				@include('config.layouts.nav-config')

				<section class="col-md-9">
					<h1 class="text-title">Editar Perfil</h1>
					<p class="text">As seguintes informações estaram amostra em seu perfil para outros usuários</p>
					<form name="editar" method="POST" action="{{route('config_update_perfil')}}" id="altera_form" enctype="multipart/form-data">
						@csrf
						<section class="form-group">
							<section class="input-group mb-3">
								<section class="custom-file">
									<input type="file" class="custom-file-input" id="foto" name="foto" aria-describedby="inputGroupFileAddon03" accept="image/*">
									<label class="custom-file-label" for="foto">Adicione uma foto de perfil</label>
								</section>
							</section>

							<figure>
								@if(empty($dadosUsuario['foto']))
									@if(empty($dadosUsuario['sexo']) || $dadosUsuario['sexo'] == 'masculino' || $dadosUsuario['sexo'] == null)
										<img class="foto_media" src="{{ asset('img/foto_perfis/user_m.svg') }}" alt="Imagem do Usuário">
									@else
										<img class="foto_media" src="{{ asset('img/foto_perfis/user_f.svg') }}" alt="Imagem do Usuário">
									@endif
								@else
									<img class="foto_media rounded-circle" src="{{ asset('img/foto_perfis/'.$dadosUsuario['foto']) }}" alt="Imagem do usuário">
								@endif
							</figure>

							@if(!empty($dadosUsuario['foto']))
								<a href="retira_foto.php">
									<button class="btn btn-danger" type="button">
										Retirar Foto
									</button>
								</a>
							@endif
						</section>

						<section class="form-group">
							<section class="input-group mb-3">
								<section class="custom-file">
									<input type="file" name="banner" class="custom-file-input" id="banner" aria-describedby="inputGroupFileAddon03" accept="image/*">
									<label class="custom-file-label" for="banner">Adicione um banner</label>
								</section>
							</section>
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
						</section>

						<section class="form-group row">
							<section class="col-md-6">
								<label for="nomeU">
									Nome
								</label>
								<input class="form-control" id="nomeU" type="text" name="nome" value="{{ ucwords($dadosUsuario['nome'])}}" require>
							</section>
						</section>

						<section class="form-group">
							<label for="status">
								Sobre
							</label>
							<textarea class="form-control" id="status" style="resize: none" id="status" name="sobre" row="3">{{ $dadosUsuario['sobre'] }}</textarea>
						</section>
						<section class="form-group row">
							<section class="col-md-6">
								<label for="site">
									Site
								</label>
								<input class="form-control" type="text" name="site" id="site" value="{{ $dadosUsuario['site'] }}">
							</section>
							<section class="col-md-6">
								<label for="esporte">
									Esporte 
								</label>
								@if(!empty($time))
									<select class="custom-select" id="esporte" name="esporte" disabled="disabled">
								@else
									<select class="custom-select" id="esporte" name="esporte">
								@endif
									@if(empty($dadosUsuario['esporte']))
										<option value=""></option>
									@endif
					
									<option value="futebol" @if($dadosUsuario['esporte'] == 'futebol') selected @endif>Futebol</option>
									<option value="basquete"  @if($dadosUsuario['esporte'] == 'basquete') selected @endif>Basquete</option>
									<option value="volei"  @if($dadosUsuario['esporte'] == 'volei') selected @endif>Vôlei</option>
								</select>
							</section>
						</section>

						<button class="btn btn-light" type="button" name="salvar" data-toggle="modal" data-target="#alterar_usuario">
							Salvar Alterações
						</button>
						<a href="perfil.php">
							<button class="btn btn-danger" type="button">Cancelar</button> 
						</a>

				</section>
			</section>	
		</section>

		<!--Modal-Confirmação_de_Senha-->
		<section class="modal fade" id="alterar_usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<section class="modal-dialog">
				<section class="modal-content">
					<section class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Confime sua Senha</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</section>
					<section class="modal-body">	
						<section class="tudo-box">
							<label for="senha">
								Senha
							</label>
							<input id="senha" type="password" name="senha" placeholder="******"/>
							<span class='erro-validacao template msg-senha'>
						</section>
					</section>
					<section class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<input type="submit" name="alterar" value="Alterar" class="btn btn-primary" data-toggle="modal" data-target="#resposta_alterar">
			</form>
					</section>
				</section>
			</section>
		</section>

		<!--Modal-Senha-Incorreta -->
		<section>
			<section class="modal fade" id="senha_incorreta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<section class="modal-dialog">
					<section class="modal-content">
						<section class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Senha Incorreta</h5>
						</section>
						<section class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
						</section>
					</section>
				</section>
			</section>						
		</section>

		<!--Modal-Alterações_Completas-->
		<section>
			<section class="modal fade" id="alteracao_completa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<section class="modal-dialog">
					<section class="modal-content">
						<section class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Alterações Completas</h5>
						</section>							     
						<section class="modal-footer">
							<a href="perfil.php">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#completa">OK</button>
							</a>
						</section>
					</section>
				</section>
			</section>						
		</section>
    </main>

	<script type="text/javascript" src="{{asset('js/alterar.js') }}"></script>
@endsection