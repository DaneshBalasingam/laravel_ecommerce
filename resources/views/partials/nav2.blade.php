<div class="row">

	<nav id="site-navigation" class="main-navigation" role="navigation">
		<div id="mobile-top-nav">

			<div id="mobile-top-nav-left">
				<div class="mobile-menu-toggle" aria-label="Menu button">        		
					<span class="glyphicon glyphicon-list" aria-hidden="true"></span>
	        	</div>
	        </div>

	      	<div id="mobile-top-nav-right">
        		<div class="mobile-search-toggle" aria-label="Search button">
	        		<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
	        	</div>
        		<div id="mobile_search" class="mobile-nav-widget">
					 
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
				menu
			</div>
			<div id="search_box">
				search box 
			</div>
		</div>
	</nav>
</div>


