<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Laravel</title>
		
		<link href="{{ asset('/css/all.css') }}" rel="stylesheet">


		<!-- Fonts-->
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
		<div id="page-wrap">

			@include('partials/header')


			@include('partials/nav2')


			<div class="container">
				<div class="content">

					@if (session('flash_notification'))
						<div class="alert">
							@include('flash::message')
						</div>
					@endif

					@yield('content')
					

				</div>

					
			</div>


			@yield('footer')

		</div>

		<script type="text/javascript" src="{{ asset('/js/all.js') }}"></script>
		
		<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>

		
	</body>

</html>
