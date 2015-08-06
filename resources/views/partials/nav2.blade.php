<div class="row">

	<nav id="site-navigation" class="main-navigation" role="navigation">
		<div id="mobile-top-nav" class="clearfix">
			<div id="mobile-top-nav-left">
				<div class="mobile-menu-toggle" aria-label="Menu button">        		
					<span class="glyphicon glyphicon-list" aria-hidden="true"></span>
	        	</div>
	        </div>

	      	<div id="mobile-top-nav-right" class="clearfix">
        		<div class="mobile-search-toggle" aria-label="Search button">
	        		<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
	        	</div>
        		<div id="mobile_search" class="mobile-nav-widget">

						<form action="action_page.php" method="POST">
							<input type="text" class="search-field" placeholder="search for">
							<button type="submit" class="search-submit right">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</button>
						</form> 
										 
				</div>
	        	<div class="mobile-user-toggle" aria-label="User button">
	        		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
	        	</div>
	        	<div id="user" class="mobile-nav-widget">
					@if (Auth::guest())
						<div id="mobile-logged-out" class="mobile-acc-info-widget">
							<a id="register-button" href="{{ url('/auth/register') }}">Register</a>
							<a id="logIn-button" href="{{ url('/auth/login') }}" id="logInButton">Log In</a>
						</div>
					@else
						<div id="mobile-logged-in" class="mobile-acc-info-widget">
							<a id="welcome-user-button" href="#">Welcome {{ Auth::user()->name }}</a>
							<a id="logOut-button" href="{{ url('/auth/logout') }}" id="logOutButton">Log Out</a>
						</div>				
					@endif
				</div>
	        	<div class="mobile-cart-toggle" aria-label="Cart button">
	        		<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
	        	</div>
	        	<div id="mobile-cart" class="mobile-nav-widget" data-cart="{{ url('/carts') . '/' . session('cart')->id }}"> 
				</div>
        	</div>
    	</div>

    	<div id="top-nav" class="clearfix">
			<div id="menu">
				<ul id="primary-menu" class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li><a href="{{ url('about') }}">About</a></li>
					<li><a href="{{ url('contact') }}">Contact</a></li>
					<li><a href="{{ url('products') }}">Products</a>
						@unless ($categories->isEmpty())			
						<ul>
						
							@foreach ($categories as $category)

								@if ( $category->type == 'product' && $category->parentCategories->isEmpty())
									
									<li><a href="{{ url('/categories',$category->slug) }}">{{ $category->name }}</a>
										@if( !$category->subCategories->isEmpty() )
											<ul>
												@foreach ( $category->subCategories as $sub_cat )
													<li><a href="{{ url('/categories',$sub_cat->slug) }}">{{ $sub_cat->name }}</a></li>
												@endforeach
											</ul>
										@endif	

									</li>
								@endif
							@endforeach
						
						</ul>
						@endunless
					</li>
					<li><a href="{{ url('articles') }}">Articles</a>
						@unless ($categories->isEmpty())
						<ul>
							@foreach ($categories as $category)

								@if ( $category->type == 'article' && $category->parentCategories->isEmpty())
									
									<li><a href="{{ url('/categories',$category->slug) }}">{{ $category->name }}</a>
										@if( !$category->subCategories->isEmpty() )
											<ul>
												@foreach ( $category->subCategories as $sub_cat )
													<li><a href="{{ url('/categories',$sub_cat->slug) }}">{{ $sub_cat->name }}</a></li>
												@endforeach
											</ul>
										@endif	

									</li>
								@endif
							@endforeach							
						</ul>
						@endunless
					</li>
		

				
					@if( \Auth::user() && \Auth::user()->hasRole('admin') )
						<li><a href="{{ url('admin') }}">Admin</a></li>
					@endif							
				</ul>
			</div>
			<div id="search_box">
				<form action="action_page.php" method="POST">
					<input type="text" class="search-field" placeholder="search for">
					<button type="submit" class="search-submit right">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					</button>
				</form> 
			</div>
		</div>
	</nav>
</div>


