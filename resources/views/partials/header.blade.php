<div id="header" class="clearfix" >

	
	<div id="site-logo" class="clearfix">
		<div id="logo-img">
			 <img src="{{ asset('/images/luthier_logo.jpg') }}">
		     
		</div>
		<div id="logo-text">
			<p id="logo-head">
				<h1 class="site-title">
					<a href="{{ url('/') }}" rel="home">SYNDICATED LUTHIERS</a>
				</h1>
			</p>
			<p id="logo-caption">
				<p class="site-description">"We string notes together"</p>
			</p>
		</div>

	</div>

	<div id="header-user" class="clearfix">
		@if (Auth::guest())
			<div id="header-logged-out" class="account-info-widget">

				<a id="register-button" href="{{ url('/auth/register') }}">Register</a>

				<a id="logIn-button" href="{{ url('/auth/login') }}" id="logInButton">Log In</a>

			</div>
		@else
			<div id="header-logged-in" class="account-info-widget">
				<a id="welcome-user-button" href="#">Welcome {{ Auth::user()->name }}</a>
				<a id="logOut-button" href="{{ url('/auth/logout') }}" id="logOutButton">Log Out</a>
			</div>				
		@endif

		<div id="cart_toggle" aria-label="Cart button">
		    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
		    	Cart
		</div>
		<div id="cart_display" class="mobile-nav-widget" data-cart="{{ url('/carts') . '/' . session('cart')->id }}">
				
		</div>
	</div>
</div><!-- closes header -->


