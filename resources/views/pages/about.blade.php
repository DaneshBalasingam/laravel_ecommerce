@extends('app')

@section('content')

	<div class="title">About Page : {{ $first }} {{ $last }} </div>
	<div>This is some random stuff about Me</div>

	<div>
		@unless ($first == 'Danesh')

			<p>We don't know the contact</p>

		@else

			<p>This is Danesh phone number</p>

		@endunless
	</div>

	<div>
		<h3>Musicians I like:</h3>

		<ul>
			@forelse($people as $person)

					<li>{{ $person }}</li>
				
			@empty
	    		<p>No users</p>
			@endforelse
		</ul>

	</div>

@stop


