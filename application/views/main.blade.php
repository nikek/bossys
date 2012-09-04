<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Bossys</title>
	<meta name="viewport" content="width=device-width">
	<link rel="apple-touch-icon" sizes="144x144" href="img/bosse-apple-icon.png" />
	{{ HTML::style('css/style.css') }}
	<script>
		function hideURLbar() {
			if (window.location.hash.indexOf('#') == -1) {
				window.scrollTo(0, 1);
			}
		}

		if (navigator.userAgent.indexOf('iPhone') != -1 || navigator.userAgent.indexOf('Android') != -1) {
		    addEventListener("load", function() {
		            setTimeout(hideURLbar, 0);
		    }, false);
		}
	</script>
</head>
<body>
	<div class="wrap">
		<header>
			{{ HTML::image('img/bosse2012-logotyp.png', 'Bosse Systems', array('id' => 'logo-header')); }}
		</header>
		
		@yield('content')
		
		<footer>
			&copy; 2012 Vraque @yield('authbar')
		</footer>
	</div>
</body>