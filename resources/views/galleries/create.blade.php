

	<h2>Upload a new Image</h2>

	{!!  Form::open(['upload_image_2','url' => 'pictures', 'files' => true]) !!}

		 @include('pictures.form_2', ['submitButtonText' => "Add Image"])

	{!!  Form::close() !!}

	@include('errors.list') 

	<hr>

    <div>
    	{!!  Form::open(['url' => 'galleries']) !!}

    	<div id="set_gallery_button" >
				Set Gallery
		</div>
		
    	<select id="gallery_selector" multiple="multiple" class="image-picker show-html">

	    	@unless ($pictures->isEmpty())

	    		@foreach ($pictures as $picture)

	    			<option data-img-src="{{ asset('/images/uploads/small-' . $picture->filename) }}"
	    					id="{{$picture->id}}"
	    			     	value="{{$picture->id}}">{{$picture->filename}}</option>

	    		@endforeach

	    	@endunless

    	</select>

    	{!!  Form::close() !!}

    	
	</div>



