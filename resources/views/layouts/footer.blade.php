<footer>
	<section class="area_footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h3 class="footer_title">Sugestões</h3>
					<form name="sugestao" method="POST" action="#">
						@csrf

						<div class="form-grup">
							<label for="nome" style="color:#100b25;">Nome</label>
							<input id="Nome" class="form-control" disabled type="text" name="nome_sug" value = "{{echo ucwords($nome)}}">
						</div>
					
					
						<div class="form-grup">
							<label for="email" style="color:#100b25;">Email</label>
							<input class="form-control"  disabled type="text" name="email_sug" value="{{echo $email}}">
						</div>
						
						<div class="form-grup">	
							<label for="mensagem" style="color:#100b25;">Sugestão</label>
							<textarea class="form-control" style="resize: none;;;;;" name="sugestao" rows="4" placeholder="Digite sua Sugestão" required="required"/></textarea>
						</div>
						<button class="btn btn-outline-light btn-lg mt-3 btn-block" type="submit" name="enviar_sugestao">Enviar</button>
					</form>
				</div>
				<section>
					<div class="modal fade" id="sucesso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					    <div class="modal-dialog">
					    	<div class="modal-content">
					      		<div class="modal-header">
					        		<h5 class="modal-title" id="exampleModalLabel">
					        			@switch($sexo)
					        				@case('masculino')
					        					Agradecemos a sua sugestão, iremos tentar atende-lo o mais rápido possível!
					        				@break

					        				@case('femenino')
					        				    Agradecemos a sua sugestão, iremos tentar atende-la o mais rápido possível!
					        				@break

					        				@default
					        					Agradecemos a sua sugestão, iremos tentar atende-lx o mais rápido possível!
					        			@endswitch
					        		</h5>
					     		</div>
				     			<div class="modal-footer">
							        <a href="{{}}"><button type="button" class="btn btn-secondary">OK</button></a>
							    </div>
							</div>
						</div>
					</div>
				</section>
				<section>
					<div class="modal fade" id="falha" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					    <div class="modal-dialog">
					    	<div class="modal-content">
					      		<div class="modal-header">
					        		<h5 class="modal-title" id="exampleModalLabel">Não foi possível enviar sua sugestão, tente novamente!</h5>
					     		</div>
				     			<div class="modal-footer">
							        <a href="{{}}"><button type="button" class="btn btn-secondary">OK</button></a>
							    </div>
							</div>
						</div>
					</div>
				</section>
                
				<div class="col-md-6">
					<h3 class="footer_title">Nossas Redes Sociais</h3>	
						<section class="d-flex align-items-center flex-column">
							<div class="mx-auto" style="width: 250px;">
								<img class="redes_sociais" style="width: 250px;" src="./img/redes_sociais.svg">
							</div>
						</section>	
						<section class="text-center" style="margin-top: 25px;">
							<a href="https://www.instagram.com/search_players/" target="_blank">
								<button class="btn btn-danger" style="background-color:#ff3c00; color:#100b25;"><i class="fab fa-instagram"></i> @@search_players</button>
							</a>
							<a href="https://www.facebook.com/searchplayers" target="_blank">
								<button class="btn btn-danger" style="background-color:#ff3c00; color:#100b25;"><i class="fab fa-facebook-square"></i> Search Players</button>
								
							</a>	
						</section>		
				</div>
			</div>
		</div>
	</section>
	<section class="area_copy">
		<div class="container">
			<div class="row">
				<p class="col-md-12">
					Copyright &copy; 2020 Search Players.
				</p>
			</div>
		</div>
	</section>
</footer>

<script type="text/javascript" src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" integrity="sha384-9/D4ECZvKMVEJ9Bhr3ZnUAF+Ahlagp1cyPC7h5yDlZdXs4DQ/vRftzfd+2uFUuqS" crossorigin="anonymous"></script>