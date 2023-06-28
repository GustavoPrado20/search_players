<!DOCTYPE html>
<html lang = "pt-BR">
    <head>
        <link rel = "stylesheet" href = "{{asset('css/bootstrap.min.css')}}">
		<link rel = "stylesheet" href = "{{asset('css/main.css')}}">
		<link rel = "stylesheet" href = "{{asset('css/style_footer.css')}}">
		<link rel = "stylesheet" href = "{{asset('css/style_header.css')}}">
		<link rel = "stylesheet" href = "{{asset('css/style_home.css')}}">
		<link rel = "stylesheet" href = "{{asset('css/style.css')}}">
		<link rel = "stylesheet" href = "{{asset('css/style_camp.css')}}">
		<link rel = "stylesheet" href = "{{asset('css/style_chat.css')}}">
		<link rel = "stylesheet" href = "{{asset('css/style_config.css')}}">
		<link rel = "stylesheet" href = "{{asset('css/style_meutime.css')}}">
		<link rel = "stylesheet" href = "{{asset('css/style_partidas.css')}}">
		<link rel = "stylesheet" href = "{{asset('css/style_perfil.css')}}">
		<link rel = "stylesheet" href = "{{asset('css/style_rank.css')}}">
		<link rel = "stylesheet" href = "{{asset('css/style_termos.css')}}">
		<link rel = "preconnect" href = "https://fonts.gstatic.com">
		<link href = "https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,600&display=swap" rel = "stylesheet">	
		<link rel = "sortcut icon" href = "{{asset('img/icon.png')}}" type = "image/x-icon" />

		<!- csrf token ->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<meta charset = "UTF-8">		
		<meta name = "author" content="Equipe Search Players">
		<meta name = "description" content="Página de Inicio">
		<meta name = "keywords" content="Search Players">

		<title>Search Players</title>
    </head>

	<body>
		@include('layouts.header')

		@yield('conteudo')

		@include('layouts.footer')
	</body>

</html>