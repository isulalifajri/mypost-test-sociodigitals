<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{ asset('frontend/img/icons/icon-48x48.png') }}" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>{{ $title }}</title>

	<link href="{{ asset('frontend/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/light.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/picture.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		
		<div class="main">
			@include('frontend.partials.header')

			<main class="content">
				@yield('container')
			</main>

			@include('frontend.partials.footer')
		</div>
	</div>

	<script src="{{ asset('frontend/js/app.js') }}"></script>


	@if(request()->is('allpost*'))
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
		@stack('blogs-filter')
	@endif
	@if(request()->is('mypost*'))
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
		@stack('post-search')
	@endif


</body>

</html>