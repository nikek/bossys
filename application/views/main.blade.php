<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Bossys</title>
	<meta name="viewport" content="width=device-width">
	{{ HTML::style('laravel/css/style.css') }}
</head>
<body>
	<div id="wrap">
		<header>
			<h1>BosSys</h1>
			<h2>Bättre än systemet</h2>
		</header>
		
		<section>
			@yield('content')
		</section>
		
		<footer>
			&copy; 2012 Vraque @yield('authbar')
		</footer>
	</div>
</body>