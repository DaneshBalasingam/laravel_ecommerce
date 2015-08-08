function gallery () {

	$('#product-gallery img').click(function() {
		
  		
  		image_url = $('#product-picture').attr('data-url') + $(this).attr('data-image');
  		$('#product-picture img').attr('src', image_url);
	});

} 