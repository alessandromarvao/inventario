<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Inventário - Campus Barreirinhas</title>
	<link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="/css/style.css">
</head>
<body>
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-left">
					<a class="navbar-brand" href="#" >Home</a>
				</div>
				<div class="navbar-right">
					<a class="navbar-brand" href="/sala">Salas</a>
					<a class="navbar-brand" href="/item">Itens</a>
				</div>
			</div>
		</div>
	</nav>
	<main>
		<section class="container">
			@yield('content')
		</section>
	</main>
	<script src="/js/app.js" charset="utf-8"></script>
	@stack('scripts')
</body>
</html>
