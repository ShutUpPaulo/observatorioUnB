$(window).load(function()
{
	$('#loading_layer').fadeTo(1000, 0, function()
	{
		$('#loading_layer').remove();  
		$('body').css('position', 'inherit');
		$('body').css('overflow', 'inherit');
	});
});
$(document).ready(function()
{
	$('.scrollspy').scrollSpy();
	// Verifica se está na home.
	if($(".homeClean").length) {
		$('.slider').slider(
		{
			full_width: true,
			height: 300
		});
	}
	// Verifica se está no perfil.
	if($("nav.perfil").length)
	{
		$(window).scroll(function()
		{
			var height = $(window).scrollTop();
			if(height  > 85)
			{
				$("nav").removeClass('transp').addClass('green-nav');
			}
			else
			{
				$("nav").removeClass('green-nav').addClass('transp');
			}
		});
			
		$('.timer').countTo();
	}
	$(".dropdown-button").dropdown();
		
});
(function($){
	$(function(){
	
		
		$('.button-collapse').sideNav();
		
		$('.parallax').parallax();
	
		var options = [
		{
			selector: '#staggered-test', offset: 50, callback: 'Materialize.toast("This is our ScrollFire Demo!", 1500 )'
		},
		{
			selector: '#staggered-test', offset: 205, callback: 'Materialize.toast("Please continue scrolling!", 1500 )'
		},
		{
			selector: '#staggered-test', offset: 400, callback: 'Materialize.showStaggeredList("#staggered-test")'
		},
		{
			selector: '.profile_icon', offset: 50, callback: 'Materialize.fadeInImage(".profile_icon")'
		}];
		
		Materialize.scrollFire(options);
	
	/*
	Atualizar tamanho Slider
	$( window ).resize(function()
	{
		
	});
	
	*/

  }); // end of document ready
})(jQuery); // end of jQuery name space