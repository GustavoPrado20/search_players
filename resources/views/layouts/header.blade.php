<header class = "navbar navbar-expand navbar-dark flex-column fixed-top flex-md-row bd-navbar">
    <!- imagem Logo header ->
    <a class = "navbar-brand mr-0 mr-md-2" href="{{route('home')}}">
        <img class="logo" src="{{asset('img/logo_light.png')}}" alt="Logo Search Players">
    </a>

    <!- inicio menu hamburguer ->
    <section class = "itens_1">

        <input type = "checkbox" id = "hamburguer" style = "display: none;">
        <label for = "hamburguer">
            <section class = "hamburguer">
            </section>
        </label>

        <nav class = "menu scrollbar-warning">
            <ul class = "menu_list">
                <!- Foto de perfil do Usuario -->
                <li class = "menu_item_perfil border-bottom border-white">
                    <a href = "perfil.php">
                        <figure>
                            @if (empty($dadosUsuario['foto'])) <!- imagem caso o Usuario nao tenha adicionado nenhuma foto de perfil | Imaem padrao so sistema -->
                                @if (empty($dadosUsuario['sexo']) || $dadosUsuario['sexo'] == "masculino")
                                    <img class = "user_img" src = "{{asset('img/foto_perfis/user_m.svg')}}" alt = "Imagem Usuario">
                                @else
                                    <img class = "user_img" src = "{{asset('img/foto_perfis/user_f.svg')}}" alt = "Imagem Usuaria">
                                @endif
                            @else <!- Foto de perfil adicionada pelo Usuario -->
                                 <img class = "user_img" src = "{{asset('img/foto_perfis/'.$dadosUsuario['foto'])}}" alt = "Imagem Usuario">
                            @endif
                        </figure>
                    </a>

                    <!- Nome do Usuario -->
                    <a class = "menu_link_perfil" href = "perfil.php">
                        <h4>
							{{ ucwords($dadosUsuario['nome']); }}
                        </h4>
                    </a>
                </li>
                
                <!- inicio da navegação do menu -->
                <li class = "menu_item">
                    <a class="menu_link" href="home.php">
                        <i class = "menu_icon fas fa-home"></i>
                        Home
                    </a>
                </li>

                @switch($dadosUsuario['tipo_usuario'])
                    @case('jogador')
                        <li class="menu_item">
							<a class="menu_link" href="meus_times.php">
								<i class="menu_icon fas fa-users"></i>
								Meus times
							</a>
						</li>

						<li class="menu_item">
							<a class="menu_link" href="times.php">
								<i class="menu_icon fas fa-users"></i>
								Times
							</a>
						</li>

						<li class="menu_item">
							<a class="menu_link" href="partidas.php">
								<i class="menu_icon fas fa-futbol"></i>
								Partidas
							</a>
						</li>

						<li class="menu_item">
							<a class="menu_link" href="camp.php">
								<i class="menu_icon fas fa-trophy"></i>
								Campeonatos
							</a>
						</li>

						<li class="menu_item">
							<a class="menu_link" href="rank_jogadores.php">
								<i class="menu_icon fas fa-award"></i>
								Ranking
							</a>
						</li>
                    @break

                    @case('administrador_time')
                        <li class="menu_item">
							<a class="menu_link" href="meu_time.php">
								<i class="menu_icon fas fa-users"></i>
								Meu time
							</a>
						</li>

						<li class="menu_item">
							<a class="menu_link" href="times.php">
								<i class="menu_icon fas fa-users"></i>
								Times
							</a>
						</li>

						<li class="menu_item">
							<a class="menu_link" href="jogadores.php">
								<i class="menu_icon fas fa-user"></i>
								Jogadores
							</a>
						</li>

						<li class="menu_item">
							<a class="menu_link" href="partidas.php">
								<i class="menu_icon fas fa-futbol"></i>
								Partidas
							</a>
						</li>

						<li class="menu_item">
							<a class="menu_link" href="camp.php">
								<i class="menu_icon fas fa-trophy"></i>
								Campeonatos
							</a>
						</li>

						<li class="menu_item">
							<a class="menu_link" href="rank_times.php">
								<i class="menu_icon fas fa-award"></i>
								Ranking
							</a>
						</li>
                    @break

                    @default
                    <li class="menu_item">
							<a class="menu_link" href="partidas.php">
								<i class="menu_icon fas fa-futbol"></i>
								Partidas
							</a>
						</li>

						<li class="menu_item">
							<a class="menu_link" href="camp.php">
								<i class="menu_icon fas fa-trophy"></i>
								Campeonatos
							</a>
						</li>

						<li class="menu_item">
							<a class="menu_link" href="rank_times.php">
								<i class="menu_icon fas fa-award"></i>
								Ranking
							</a>
						</li>
                @endswitch               
            </ul>
        </nav>

        <!- inicio pesquisar -->
        <form class="search_box" name="pesquisar" method="POST" action="buscar.php">
			@csrf
		
            <input class="search_txt" type="text" name="busca" placeholder="Pesquisar" required="required"/ value= "{{ old('busca') }}">
            <button class="search_btn" type="submit" name="enviar">
				<i class="fas fa-search"></i>
			</button>
        </form>

    </section>

    <!- Botoes de notificação e converça -->
    <ul class="navbar-nav ml-md-auto">
        <!- Botão Chat -->
		<li class="nav-item">
			<a class="nav-link pl-2 pr-1 mx-1 py-3 my-n2" href="{{route('contatos')}}">
				<i class="far fa-comment"></i>
			</a>
		</li>

        <script type = "text/javascript" src = "{{asset('js/notificacao_header.js')}}"></script>

        <!- Botão Notificação -->
        <li class="nav-item dropdown">
			<a class="nav-link dropdown px-1 mx-1 py-3 my-n2" id="bell" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="far fa-bell"></i>
			</a>

			<section class="dropdown-menu dropdown-menu-md-right" aria-labelledby="bell">
				<section id="notificacoes">

				</section>
			</section>
		</li>	

        <!- Botão Configurações -->
		<li class="nav-item dropdown">
			<a class="nav-link dropdown px-1 mx-1 py-3 my-n2" id="config" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-angle-down"></i>
			</a>

			<section class="dropdown-menu dropdown-menu-md-right" aria-labelledby="config">
				<a class="dropdown-item" href="config_perfil.php">Configurações</a>
				<a class="dropdown-item" href="perfil.php">Perfil</a>
				<a class="dropdown-item" href="{{ Route('logout') }}">Sair</a>
			</section>
		</li>
	</ul>

</header>
