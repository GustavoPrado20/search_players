<footer>
	<section class="area_footer">
		<section class="container">
			<section class="row">
				<section class="col-md-6">
					<h3 class="footer_title">Sugestões</h3>
					<form name="sugestao_form" method="POST" action="#">
						@csrf

						<section class="form-grup">
							<label for="nome" style="color:#100b25;">Nome</label>
							<input id = "nome" class="form-control" disabled type="text" name="nome" value = "{{ ucwords($dadosUsuario['nome']) }}" autocomplete = "on">
						</section>
					
					
						<section class="form-grup">
							<label for="email" style="color:#100b25;">Email</label>
							<input id = "email" class="form-control"  disabled type="text" name="email" value="{{ $dadosUsuario['email'] }}" autocomplete = "on">
						</section>
						
						<section class="form-grup">	
							<label for="sugestao" style="color:#100b25;">Sugestão</label>
							<textarea id = "sugestao" class="form-control" style="resize: none;;;;;" name="sugestao" rows="4" placeholder="Digite sua Sugestão" required="required"/></textarea>
						</section>
						<button class="btn btn-outline-light btn-lg mt-3 btn-block" type="submit" name="enviar_sugestao">Enviar</button>
					</form>
				</section>
				<section>
					<section class="modal fade" id="sucesso" tabindex="-1" aria-labelledby="exampleModalLabelC" aria-hidden="true">
					    <section class="modal-dialog">
					    	<section class="modal-content">
					      		<section class="modal-header">
					        		<h5 class="modal-title" id="exampleModalLabelC">
					        			@switch($dadosUsuario['sexo'])
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
					     		</section>
				     			<section class="modal-footer">
							        <a href=""><button type="button" class="btn btn-secondary">OK</button></a>
							    </section>
							</section>
						</section>
					</section>
				</section>
				<section>
					<section class="modal fade" id="falha" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					    <section class="modal-dialog">
					    	<section class="modal-content">
					      		<section class="modal-header">
					        		<h5 class="modal-title" id="exampleModalLabel">Não foi possível enviar sua sugestão, tente novamente!</h5>
					     		</section>
				     			<section class="modal-footer">
							        <a href=""><button type="button" class="btn btn-secondary">OK</button></a>
							    </section>
							</section>
						</section>
					</section>
				</section>
                
				<section class="col-md-6">
					<h3 class="footer_title">Nossas Redes Sociais</h3>	
						<section class="d-flex align-items-center flex-column">
							<section class="mx-auto" style="width: 250px;">
								<img class="redes_sociais" style="width: 250px;" src="{{asset('img/redes_sociais.svg')}}">
							</section>
						</section>	
						<section class="text-center" style="margin-top: 25px;">
							<a href="https://www.instagram.com/search_players/" target="_blank">
								<button class="btn btn-danger" style="background-color:#ff3c00; color:#100b25;"><i class="fab fa-instagram"></i> @@search_players</button>
							</a>
							<a href="https://www.facebook.com/searchplayers" target="_blank">
								<button class="btn btn-danger" style="background-color:#ff3c00; color:#100b25;"><i class="fab fa-facebook-square"></i> Search Players</button>
								
							</a>	
						</section>		
				</section>
			</section>
		</section>
	</section>
	<section class="area_copy">
		<section class="container">
			<section class="row">
				<p class="col-md-12">
					Copyright &copy; 2020 Search Players.
				</p>
			</section>
		</section>
	</section>
</footer>

<script type="text/javascript" src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" integrity="sha384-9/D4ECZvKMVEJ9Bhr3ZnUAF+Ahlagp1cyPC7h5yDlZdXs4DQ/vRftzfd+2uFUuqS" crossorigin="anonymous"></script>