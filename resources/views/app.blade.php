<!doctype html>
<html lang="en">
<head>
	<meta charset="UFT-8">
	<link rel="stylesheet" type="text/css" href="/css/all.css">
	<title>My First App</title>
</head>

<body>
 	
 	@include('partials.nav')

	<div class="container">
		@include('flash::message')

		@yield('content')
	</div>


	)

<!-- Latest compiled and minified JS -->
<script src="/js/all.js"></script>
@yield('footer')

<script>
	$('#flash-overlay-modal').modal();
</script>

</body>
</html>

