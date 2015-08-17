@extends('app')

@section('content')

	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">

			@unless( $banners->isEmpty())
				<?php $data_slide = 0; ?>

				@foreach ($banners as $banner)

					<li data-target="#carousel-example-generic" data-slide-to="<?php echo $data_slide; ?>"></li>
					<?php $data_slide++;?>	
				@endforeach
			@endunless
		</ol>

	

		<div id="slide_box" class="carousel-inner" role="listbox">

			@unless( $banners->isEmpty())

				@foreach ($banners as $banner)
		    	<div class="item">
		    		<img src="{{ asset( '/images/uploads/banner-' . $banner->image_name) }}" alt="{{ $banner->title }}">
			      <div class="carousel-caption">
			      	<h3 class="slider_title">{{ $banner->title }}</h3>
			      	<div class="slider_excerpt">{{ $banner->excerpt }}</div>
			      	<a class="slider_link" href="{{ url($banner->link) }}">READ MORE</a>
			      </div>
			    </div>		    		
		
				@endforeach
			@endunless

		</div>

		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		</a>
	 
	</div>




@stop


				
