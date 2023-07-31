<?php
	session_start();
	include('verifica_login.php');
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<!-- Styles -->
		<link rel="stylesheet" href="./public/css/style_header.css">
		<link rel="stylesheet" href="./public/css/style_footer.css">
		<link rel="stylesheet" href="./public/css/style_home.css">
		<link rel="stylesheet" href="./public/css/bootstrap.min.css">
		<link rel="stylesheet" href="./public/css/main.css">
		<meta charset="UTF-8">
		<link rel="sortcut icon" href="./public/img/icon.png" type="image/x-icon" />
		<title>Search Players</title>
		<meta name="author" content="Equipe Search Players">
		<meta name="description" content="Retirar Banner">
		<meta name="keywords" content="Search Players">
	</head>
	<body>
		<?php
			include('header.php');
		?>
		<main>

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
		
			<!--Modal-Falha_ao_Fazer_a_Alteração-->
			<section>
				<div class="modal fade" id="falha_alteracao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				    <div class="modal-dialog">
				    	<div class="modal-content">
				      		<div class="modal-header">
				        		<h5 class="modal-title" id="exampleModalLabel">Houve uma falha ao fazer a alteração</h5>
				     		</div>
			     			<div class="modal-footer">
			     				<a href="perfil.php">
						        	<button type="button" class="btn btn-secondary">OK</button>
						        </a>
						    </div>
						</div>
					</div>
				</div>				
			</section>

			<?php
				$sqlalt= 'update usuario set banner_usuario = NULL where id_usuario = '.$_SESSION['id_usuario'].';';

				$alterar=mysqli_query($conexao, $sqlalt);

				if($alterar){
					echo(unlink('img/banners_perfis/'.$_SESSION['banner_usuario']));
					$_SESSION['banner_usuario']="";
					?>
						<script type="text/javascript">
							$(document).ready(function(){
								$('#alteracao_completa').modal('show');										
							});
						</script>
					<?php
				}else{				
					?>
						<script type="text/javascript">
							$(document).ready(function(){
								$('#falha_alteracao').modal('show');										
							});
						</script>
					<?php
				}
			?>
		</main>
		<?php 
			include('footer.php');
		?>
	</body>
</html>