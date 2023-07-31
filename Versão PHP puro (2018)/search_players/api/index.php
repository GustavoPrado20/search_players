<?php
	session_start();
	include('conexao.php');

	if(!isset($_SESSION['id_usuario'])){
		unset($_SESSION['id_usuario']);
	}else{
		header('location:home.php');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>			
		<link rel="stylesheet" href="./public/css/bootstrap.min.css">
		<link rel="stylesheet" href="./public/css/main.css">
		<link rel="stylesheet" href="./public/css/style_login.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,600&display=swap" rel="stylesheet">	
		<meta charset="UTF-8">
		<link rel="sortcut icon" href="./public/img/icon.png" type="image/x-icon" />
		<title>Search Players</title>
		<meta name="author" content="Equipe Search Players">
		<meta name="description" content="form da Search Players">
		<meta name="keywords" content="Search Players">
	</head>
	<body>
		<main class="container-fluid">
			<section class=" d-none d-lg-block">
				<img src="./public/img/fumaca.png" class="smoke" alt="...">
			</section>

			<div class="row">
				<div class="col-md-8 d-none d-lg-block">
					<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
					  	<div class="carousel-inner">
						    <div class="carousel-item active">
						        <img src="./public/img/basketball.svg" class="" alt="...">
						    </div>
						    <div class="carousel-item">
						      	<img src="./public/img/soccer.svg" class="" alt="...">
						    </div>
						    <div class="carousel-item">
						     	<img src="./public/img/volley.svg" class="" alt="...">
						    </div>
					  	</div>
					</div>
				</div>
				<div class="col-lg-4 bg">
					<figure>
						<img class="logo" src="./public/img/logo_light.png" alt="Logo Search Players">
					</figure>
					<section class="box">
						<form name="login" method="POST" action="logar.php" id="login-form">
							<div class="form-group">	
								<label for="login"><h5>Email</h5></label>
								<input id="login" class="form-control" name="email" type="text" placeholder="Informe seu Email" autofocus/>
								<span class='erro-validacao template msg-emaill'/>
							</div>
							<div class="form-group">
								<label for="senha"><h5>Senha</h5></label>
								<input id="senhal" class="form-control" name="senha" type="password" placeholder="******"/>
								<span class='erro-validacao template msg-senhal'/>
							</div>
								<input class="btn btn-outline-light btn-block" type="submit" name="Entrar" Value="Entrar">
						</form>
					</section>
					<section class="box_min">
						<span>
							Não está cadastradx?
							<a href="#" data-toggle="modal" data-target="#tipo-usuario">Clique aqui</a>
						</span>
					</section>
				</div>
			</div>
		</main>

		<!--Modal-Registro_Usuario-->
		<div class="modal fade" id="tipo-usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<h5 class="modal-title" id="exampleModalLabel">Registrar-se</h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        			<span aria-hidden="true">&times;</span>
		        		</button>
		     		</div>
			      	<div class="modal-body">
			      		<div class="container-fluid">	
							<form id="cadastre-form" name="form" method="POST" action="registrar.php">
								<div class="row">
									<div class="col-md-6 form-group">
										<label for="nome">Nome</label>
										<input class="form-control" id="nome" type="text" name="nome" placeholder="Nome" autofocus/>
										<span class='erro-validacao template msg-nome'>
									</div>


									<div class="col-md-6 form-group">
										<label for="sobrenome">Sobrenome</label>
										<input class="form-control" id="sobrenome" type="text" name="sobrenome" placeholder="Sobrenome"/>
										<span class='erro-validacao template msg-sobrenome'></span>
									</div>
								</div>

								<div class="form-group">
									<label for="email">
										Email
									</label>
									<input class="form-control" id="email" type="text" name="email" placeholder="Email"/>
									<span class='erro-validacao template msg-Email'></span>
								</div>

								<div class="form-group">
									<label for="senha">
										Senha
									</label>
									<input class="form-control" id="senha" type="password" name="senha" placeholder="Senha"/>
									<span class='erro-validacao template msg-senha'></span>
								</div>

								<div class="form-group">
									<label for="c_senha">
										Confirme a Senha
									</label>
									<input class="form-control" id="senha2" type="password" name="c_senha" placeholder="Confirme a Senha"/>
									<span class='erro-validacao template msg-senha2'></span>
								</div>

								<div>
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
								</div>

								<div>
									<input type="checkbox" name="termos" id="Termos de uso" value="termos" required/>
									<label for="Termos de uso">
										Li e aceito os
										<a href="termos.html" target="_blank">
											termos de uso
										</a>
									</label>
								</div>
						</div>		
					</div>
		     		<div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						        <input type="submit" name="registrar" value="Registrar" class="btn btn-primary">
					   		</form>
					</div>		
			    </div>
			</div>
		</div>

			<!--Scripts-->
		<script type="text/javascript" src="./public/js/cadastro.js"></script>
		<script type="text/javascript" src="./public/js/login.js"></script>
		<script type="text/javascript" src="./public/js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="./public/js/bootstrap.min.js"></script>
	</body>
</html>