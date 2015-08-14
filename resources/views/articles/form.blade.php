<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
	
		<?php 
	   		if (  $errors->has('title') )  {
	   	?>
	   	<div class="alert alert-danger">
    	   	<?php
				    echo $errors->first('title'); 
				} 

    		?>
    	</div>
</div>
<div class="form-group">
	{!! Form::label('excerpt', 'Excerpt:') !!}
	{!! Form::textarea('excerpt', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('body', 'Body:') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'article_textarea' ]) !!}
</div>

<div class="form-group">
	{!! Form::label('slug', 'Slug:') !!}
	{!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('published_at', 'Publish On:') !!}
	{!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>


<div>
	<div id="set_featured_image">Add Featured Image</div>

	<a href="#">
		<img id="featured_thumbnail" data-url = "{{ asset('/images/uploads/thumbnail-')}}" 
		                             src="{{ asset('/images/uploads/thumbnail-blank.jpg')}}" >
	</a>

	<input name="featured_image" type="hidden" value="" id="featured_image">
</div>

<div>
	<div id="set_gallery">Add Gallery</div>

	<select id="gallery_form" name="gallery[]" multiple="multiple">

	</select>


	<div id="gallery_images" data-url = "{{ asset('/images/uploads/thumbnail-')}}"></div>
	
</div>

<div class="form-group">
	{!! Form::label('category_list', 'Categories:') !!}<br>

	@unless ($categories->isEmpty())
		<?php $cat_index = 0; ?>
		@foreach ($categories as $category)
		    <div class="category_form_item">
				<input type="checkbox" name="category[<?php echo $cat_index ?>]" value="{{ $category->id }}">{{ $category->name }}<br>
			</div>
			<?php $cat_index++; ?>
		@endforeach

	@endunless

</div>

<div class="form-group">
	{!! Form::label('tag_list', 'Tags:') !!}
	{!! Form::select('tag_list[]', $tags , null, [ 'id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>




