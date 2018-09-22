//<![CDATA[
$(document).ready(function(){
	
	// $('.scrollspy').scrollSpy();
	$('.parallax').parallax();
	// $(".dropdown-button").dropdown();
	// $(".button-collapse").sideNav();

	// $(".expandeHeader").bind("click", function() {
	// 	$(".headerBox").addClass("headerAberto");
	// 	$(this).addClass("hide");
	// 	$(".contraiHeader").removeClass("hide");
	// });

	// $(".contraiHeader").bind("click", function() {
	// 	$(".headerBox").removeClass("headerAberto");
	// 	$(this).addClass("hide");
	// 	$(".expandeHeader").removeClass("hide");
	// });

	// $('.abreModalPerfis').leanModal();
	$('.modal').modal();

	$(".parallax-container_topo").css("height", $( window ).height()/1.3);
	
	//artigos
	$('.tamanhoFont').bind('click', function() {
		$('.artigoTextos').toggleClass('flow-text');
	});

	$('.artigoBody').find('a').attr('target', '_blank');
	//

	//msg
	$('.returnMsg').slideUp(1, function() {
		$('.returnMsg').slideDown("slow");
	});
	$('body').on('click', '.returnMsg', function() {
		$('.returnMsg').slideUp("slow", function() {
			$('.returnMsg').remove();
		});
	});


});
//]]>