jQuery(function($) {
	/*setTimeout(function() {
		$('.navbar').css('top', '-50px');
	}, 1000);*/
	var prevYPos = $(window).scrollTop();
	$(window).scroll(function() {
		var curYPos = $(window).scrollTop();
		if(prevYPos > curYPos)
			$('.navbar').css('top', '0');
		else
			$('.navbar').css('top', '-70px');
		prevYPos = curYPos;
	});
	$(document).mousemove(function(event) {
		if(event.pageY <= 20)
			$('.navbar').css('top', '0');
	});

	$('.pricing-button').click(function() {
		var plan = $(this).attr('value');
		$('#plan').attr('value', plan);
		$('#pricing-hidden-form').submit();
	});
});