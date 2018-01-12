(function( $ ) {
	
	$('.carousel').carousel({
    interval: 10000
	})

	// Add Bootstrap classes to Forms
	$('select, input[type=text], input[type=email], input[type=password], textarea').addClass('form-control');
	$('input[type=submit]').addClass('btn btn-primary');

})(jQuery);
