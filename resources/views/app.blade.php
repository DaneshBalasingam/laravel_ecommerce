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
		<header>
			@unless ($categories->isEmpty())

				<ul>
					<li>Products
						<ul>
						
							@foreach ($categories as $category)

								@if ( $category->type == 'product' && $category->parentCategories->isEmpty())
									
									<li>{{ $category->name }}
										@if( !$category->subCategories->isEmpty() )
											<ul>
												@foreach ( $category->subCategories as $sub_cat )
													<li>{{ $sub_cat->name }}</li>
												@endforeach
											</ul>
										@endif	

									</li>
								@endif
							@endforeach
						
						</ul>
					</li>
					<li>Article
						<ul>
							@foreach ($categories as $category)

								@if ( $category->type == 'article')
								
									<li>{{ $category->name }}</li>

								@endif

							@endforeach
						</ul>

					</li>
				</ul>

			@endunless
			

		</header>

		@include('partials/nav')


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

		<script type="text/javascript" src="{{ asset('/js/all.js') }}"></script>


		
	</body>

</html>
