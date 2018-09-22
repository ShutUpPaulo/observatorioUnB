//<![CDATA[
$(document).ready(function(){
    $("#field-titulo_artigo, #field-perfil, #field-categoria").bind('blur', function() {

      val = $(this).val();
      console.log(val);
      slug = makeslug(val, '_');

      $("#field-slug_artigo, #field-slug_perfil, #field-slug_categoria").val(slug);

    });
});

function makeslug(val, replaceBy) {
  replaceBy = replaceBy || '-';
  var mapaAcentosHex  = {
    a : /[\xE0-\xE6]/g,
    A : /[\xC0-\xC6]/g,
    e : /[\xE8-\xEB]/g, // if you're gonna echo this
    E : /[\xC8-\xCB]/g, // JS code through PHP, do
    i : /[\xEC-\xEF]/g, // not forget to escape these
    I : /[\xCC-\xCF]/g, // backslashes (\), by repeating
    o : /[\xF2-\xF6]/g, // them (\\)
    O : /[\xD2-\xD6]/g,
    u : /[\xF9-\xFC]/g,
    U : /[\xD9-\xDC]/g,
    c : /\xE7/g,
    C : /\xC7/g,
    n : /\xF1/g,
    N : /\xD1/g,
  };
  
  for ( var letra in mapaAcentosHex ) {
    var expressaoRegular = mapaAcentosHex[letra];
    val = val.replace( expressaoRegular, letra );
  }
  
  val = val.toLowerCase();
  val = val.replace(/[^a-z0-9\-]/g, " ");
  
  val = val.replace(/ {2,}/g, " ");
    
  val = val.trim();    
  val = val.replace(/\s/g, replaceBy);
  
  return val;
}
//]]>