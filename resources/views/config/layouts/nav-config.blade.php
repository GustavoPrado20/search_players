<nav class="col-md-3 d-flex justify-content-end nav_config">
	<ul class="menu_config">
		<li class="menu_config_item">
			<h5><a href="{{route('config_perfil')}}" class="text_menu_config"> Editar Perfil</a></h5>
		</li>
		<li  class="menu_config_item">
			<h5><a class="text_menu_config" href="{{route('config_conta')}}">Configurações da Conta</a></h5>
		</li>
		<li  class="menu_config_item">
			<h5><a href="localiza.php" class="text_menu_config">Localização</a></h5>
		</li>
		@if(!empty($time))
			<li  class="menu_config_item">
				<h5><a href="config_time.php" class="text_menu_config">Time</a></h5>
			</li>
		@endif
	</ul>
</nav>