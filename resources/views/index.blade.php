<!DOCTYPE html>
<html lang="pt-br">
	<head>			
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/main.css')}}">
		<link rel="stylesheet" href="{{asset('css/style_login.css')}}">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,600&display=swap" rel="stylesheet">	
		<link rel="sortcut icon" href="{{asset('img/icon.png')}}" type="image/x-icon" />

		<meta charset="UTF-8">		
		<meta name="author" content="Equipe Search Players">
		<meta name="description" content="Página de Inicio">
		<meta name="keywords" content="Search Playerssection
		<title>Search Players</title>
	</head>

	<body>
		<main class="container-fluid">
			<section class=" d-none d-lg-block">
				<img src="./img/fumaca.png" class="smoke" alt="...">
			</section>

			<section class="row">
				<section class="col-md-8 d-none d-lg-block">
					<section id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
					  	<section class="carousel-inner">
						    <section class="carousel-item active">
						        <img src="./img/basketball.svg" class="" alt="...">
						    </section>
						    <section class="carousel-item">
						      	<img src="./img/soccer.svg" class="" alt="...">
						    </section>
						    <section class="carousel-item">
						     	<img src="./img/volley.svg" class="" alt="...">
						    </section>
					  	</section>
					</section>
				</section>
				<section class="col-lg-4 bg">
					<figure>
						<img class="logo" src="./img/logo_light.png" alt="Logo Search Players">
					</figure>
					<section class="box">
						<form name="login" method="POST" action="logar.php" id="login-form">
							<section class="form-group">	
								<label for="login"><h5>Email</h5></label>
								<input id="login" class="form-control" name="email" type="text" placeholder="Informe seu Email" autofocus/>
								<span class='erro-validacao template msg-emaill'/>
							</section>
							<section class="form-group">
								<label for="senha"><h5>Senha</h5></label>
								<input id="senhal" class="form-control" name="senha" type="password" placeholder="******"/>
								<span class='erro-validacao template msg-senhal'/>
							</section>
								<input class="btn btn-outline-light btn-block" type="submit" name="Entrar" Value="Entrar">
						</form>
					</section>
					<section class="box_min">
						<span>
							Não está cadastrado?
							<a href="#" data-toggle="modal" data-target="#tipo-usuario">Clique aqui</a>
						</span>
					</section>
				</section>
			</section>
		</main>

		<!--Modal-Registro_Usuario-->
		<section class="modal fade" id="tipo-usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <section class="modal-dialog">
		    	<section class="modal-content">
		      		<section class="modal-header">
		        		<h5 class="modal-title" id="exampleModalLabel">Registrar-se</h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        			<span aria-hidden="true">&times;</span>
		        		</button>
		     		</section>
			      	<section class="modal-body">
			      		<section class="container-fluid">	
							<form id="cadastre-form" name="form" method="POST" action="registrar.php">
								<section class="row">
									<section class="col-md-6 form-group">
										<label for="nome">Nome</label>
										<input class="form-control" id="nome" type="text" name="nome" placeholder="Nome" autofocus/>
										<span class='erro-validacao template msg-nome'>
									</section>


									<section class="col-md-6 form-group">
										<label for="sobrenome">Sobrenome</label>
										<input class="form-control" id="sobrenome" type="text" name="sobrenome" placeholder="Sobrenome"/>
										<span class='erro-validacao template msg-sobrenome'></span>
									</section>
								</section>

								<section class="form-group">
									<label for="email">
										Email
									</label>
									<input class="form-control" id="email" type="text" name="email" placeholder="Email"/>
									<span class='erro-validacao template msg-Email'></span>
								</section>

								<section class="form-group">
									<label for="senha">
										Senha
									</label>
									<input class="form-control" id="senha" type="password" name="senha" placeholder="Senha"/>
									<span class='erro-validacao template msg-senha'></span>
								</section>

								<section class="form-group">
									<label for="c_senha">
										Confirme a Senha
									</label>
									<input class="form-control" id="senha2" type="password" name="c_senha" placeholder="Confirme a Senha"/>
									<span class='erro-validacao template msg-senha2'></span>
								</section>

								<section>
									<section>
										<input class="jogador" type="radio" name="tipo" value="1" id="jogador" required/>
										<label for="jogador">	
											Jogadorx
										</label>
									</section>

									<section>
										<input type="radio" name="tipo" value="2" id="adm"/>
										<label for="adm">
											Administradorx de um Time
										</label>
									</section>

									<section>
										<input type="radio" name="tipo" value="3" id="analisador"/>
										<label for="analisador">
											Analisadorx de Partidas
										</label>
									</section>
								</section>

								<section>
									<input type="checkbox" name="termos" id="Termos de uso" value="termos" required/>
									<label for="Termos de uso">
										Li e aceito os
										<a href="termos.html" target="_blank">
											termos de uso
										</a>
									</label>
								</section>
						</section>		
					</section>
		     		<section class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						        <input type="submit" name="registrar" value="Registrar" class="btn btn-primary">
					   		</form>
					</section>		
			    </section>
			</section>
		</section>

			<!--Scripts-->
		<script type="text/javascript" src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	</body>
</html>