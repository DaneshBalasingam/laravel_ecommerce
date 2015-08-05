/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */

function navigation() {

	$('.mobile-menu-toggle').click(function() {
  		$('#menu').toggle();
	});

	$('.mobile-search-toggle').click(function() {
  		$('#mobile_search').toggle();
	});

	$('.mobile-user-toggle').click(function() {
  		$('#user').toggle();
	});

	$('.cart-toggle').click(function() {
  		$('#cart').toggle();
	});

	$('.mega-menu ul').addClass('hide-mega-menu');

	$('.mega-menu').click(function() {
  		$('.mega-menu ul').toggleClass('display-mega-menu');
  		$('.mega-menu ul').toggleClass('hide-mega-menu');
	});

	$(window).resize(function() {
		
  		if ( $(window).width() > 768) {
  			$('#menu').css('display', 'block');
  		}

  		if ( $(window).width() <= 768) {
  			$('#menu').css('display', 'none');
  		}
	});

	var menu_icon = '<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>'

	$('#side-nav ul li').has('ul').find('> a').append(menu_icon);
 

	
}