<?php
	include('conexao.php');
	session_start();
	include('verifica_login.php');

	$consulta='select * from usuario where esporte=3 and tipo_usuario=1 order by pontos desc';
	$executar=mysqli_query($conexao, $consulta);
?>

<link rel="stylesheet" href="./public/css/style_rank.css">

<p class="text-titulo">
	Ranking - Jogadores (Vôlei)
</p>

<table class="table" style="background-color:#222; color:#fff;" >
	<thead style="background-color:#999; ">
		<tr>
			<th scope="row">Foto dx Jogadorx</th>
			<th scope="row">Nome dx Jogadorx</th>
			<th scope="row">Colocação</th>
			<th scope="row">Pontos</th>
		</tr>
	</thead>
	<?php
		$colocacao=1;
		while($con=mysqli_fetch_array($executar)){
			?>
	<tbody>
		<tr>
			<td>
				<?php 
					$foto=1;
					include('foto_chat.php'); 
				?>
			</td>

			<th scope="row">
				<?php 
					echo(ucwords($con['nome'])); 
				?>		
			</th>

			<?php
				if(!empty($con['pontos'])){
					?>
					<th scope="row"><?php echo($colocacao.'º Lugar'); ?></th>
					<th scope="row"><?php echo($con['pontos']); ?></th>
					<?php
				}else{
					?>
					<th scope="row"><?php echo('Sem colocação'); ?></th>
					<th scope="row"><?php echo(0); ?></th>
					<?php
				}
			?>
		</tr>

		<?php 
		$colocacao=$colocacao+1;
	}	
?>
	</tbody>

</table>