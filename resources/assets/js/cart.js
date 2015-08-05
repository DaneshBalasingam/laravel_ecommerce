function loadCart () {

	$('#cart_toggle').click(function() {
  		$('#cart_display').toggle();
	});

	$('.mobile-cart-toggle').click(function() {
  		$('#mobile-cart').toggle();
	});

	var cart_url = $('#cart_display').attr('data-cart');

	$('#cart_display').load(cart_url);

	$('#mobile-cart').load(cart_url);

	$(document).on('submit', 'form[update_cart]', function(e) {

		var form = $(this);

		var method = form.find('input[name="_method"]').val();

		var url = form.prop('action');
        
		$.ajax({
			url: url,
			data: form.serialize(),
			method: method,
			success: function(data){	 

				$('#cart_display').load(cart_url);
				location.reload();
			}	

		});
		e.preventDefault();

	});



}