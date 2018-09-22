//<![CDATA[
$(document).ready(function(){
    $('.scrollspy').scrollSpy();
    $('.arvore').each(function() {
        largura = $(this).width();
        console.log(largura);
        $(this).css({
            height: largura,
            lineHeight: largura + "px"
        });
    });
});
//]]>