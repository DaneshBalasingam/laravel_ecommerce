/**

	function deals with responsive requirement of products pages
	
**/

function products() {

	//$('.product_thumb_wrap:nth-child(3n)').after('<div class="clearfix visible-lg visible-md"></div>');

	var count = 1;
	$('.product_thumb_wrap').each(function() {
		if(count == 2 || count == 4 || count == 6) {
			$(this).after('<div class="clearfix visible-sm"></div>');
		}

		if(count == 3 || count == 6 ) {
			$(this).after('<div class="clearfix visible-lg visible-md"></div>');
		}
		count++;
	});
}