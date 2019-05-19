$(document).ready(function(){
	$('.header-list_4').on('click', function(){
			$('.request').fadeIn(); /*show*/
	});

	$('.popup-close').on('click', function(){
			$('.request').hide();
	});
});