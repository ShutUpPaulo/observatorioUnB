//<![CDATA[
$(document).ready(function() {
	$('#selectTipo').prepend('<option value="" disabled selected>Selecione</option>');
	$('select').material_select();
	$('.modal-trigger').leanModal();
	$('[name = "latitude"], [name = "longitude"]').attr('length', 10);

	$('#abreMapa').bind('click', function() { dicaForm('Arraste o pin até o local do incidente.'); });
	$('#descricao').bind('click', function() { dicaForm('Descreva o incidente em até 500 caracteres com pontos de referência e indicações que facilitem a localização.'); });
	// $('.materialboxed').materialbox();

	$('#avancar_2').bind('click', function() {
		$('.returnMsg').remove();
		if ($('#selectTipo').val()) {
			$('#passo_1').fadeOut(function() {
				$('#passo_2').fadeIn();	
			});
		} else {
			$("body").append('<div class="returnMsg yellow darken-1">Selecione o tipo de incidente.</div>');
			$('.returnMsg').slideUp(1, function() {
				$('.returnMsg').slideDown("slow");
			});
		}
	});

	$('#avancar_3').bind('click', function() {
		$('#passo_2').fadeOut(function() {
			$('#passo_3').fadeIn();	
		});
	});

	$('#avancar_4').bind('click', function() {
		$('#passo_3').fadeOut(function() {
			$('#passo_4').fadeIn();	
		});
	});
});

function getLocation() {
	if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(showPosition);
	} else {
	    alert("Geolocalização não suportada por esse navegador.");
	}
	showPosition();
}
function showPosition(position) {
	// var myCenter=new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
	var myCenter=new google.maps.LatLng(-15.794410, -47.877824);
	initialize(myCenter);
}
var map;
var customIcons = {
	1: {
		icon: 'http://localhost/resiliencia/assets/img/mosquito.png'
	},
	2: {
		icon: 'http://localhost/resiliencia/assets/img/mosquito.png'
	},
	3: {
		icon: 'http://localhost/resiliencia/assets/img/mosquito.png'
	}
};
var markerNew;
var infowindowNew;
var myZoom = 16;

function initialize(myCenter) {

	var mapProp = {
		center: myCenter,
		zoom: myZoom,
		mapTypeId:google.maps.MapTypeId.ROADMAP
	};
	map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
	var infoWindow=new google.maps.InfoWindow;

	markerPosicaoIncidente = new google.maps.Marker({
		draggable: true,
		position: myCenter, 
		map: map,
		title: "Local do Incidente"
	});

	downloadUrl("get_markers/", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
        	//if (markers[i].getAttribute("type") == "azul") {
				var descricao = markers[i].getAttribute("descricao");
				var imagem = markers[i].getAttribute("imagem");
				var type = markers[i].getAttribute("type");
				var point = new google.maps.LatLng(
					parseFloat(markers[i].getAttribute("lat")),
					parseFloat(markers[i].getAttribute("lng"))
				);
				// var html = "<b>" + descricao + "</b> <br/><img src='http://localhost/observatorio/painel/assets/uploads/images/incidentes/" + imagem +"' style='width: 150px; height: auto;'>";
				var imgCaminho = "http://www.observatorioderesiduos.unb.br/painel/assets/uploads/images/incidentes/" + imagem;
				var html = "<b>" + descricao + "</b> <br/><a href='" + imgCaminho + "' target='_blank'><img src='" + imgCaminho + "' width='200'></a>";
				var icon = customIcons[type] || {};
				var marker = new google.maps.Marker({
					map: map,
					position: point
					// icon: icon.icon
				});
				bindInfoWindow(marker, map, infoWindow, html);
			//}
        }
	});

	

    

    //centraliza o mapa na posição atual ao clicar
 //    google.maps.event.addDomListener(document.getElementById('btCentro'), 'click', function () {
	// 	map.setCenter(myCenter);
	// 	map.setZoom(myZoom);
	// });
	// google.maps.event.addDomListener(document.getElementById('btCentro2'), 'click', function () {
	// 	map.setCenter(myCenter);
	// 	map.setZoom(myZoom);
	// });

	// google.maps.event.addListenerOnce(map, 'idle', function() {
	// 	google.maps.event.trigger(map, 'resize');
	// });
	
}

// google.maps.event.addDomListener(window, 'load', getLocation);
if ($('#abreMapa').html()) {
	google.maps.event.addDomListener(document.getElementById('abreMapa'), 'click', getLocation);
}

function fechaMapaReportar() {//chamada na view por onclick
	var latlng = markerPosicaoIncidente.getPosition();
    $('[name = "latitude"]').focus().val(latlng.lat().toFixed(6));
    $('[name = "longitude"]').focus().val(latlng.lng().toFixed(6));
	$('#mapa').closeModal();
	if ($('[name = "latitude"]').val() != '' && $('[name = "longitude"]').val() != '') {
		buscaCep();
	}
}

function bindInfoWindow(marker, map, infoWindow, html) {
	google.maps.event.addListener(marker, 'click', function() {
		infoWindow.setContent(html);
    	infoWindow.open(map, marker);
	});
}

function downloadUrl(url, callback) {
  	var request = window.ActiveXObject ?
    	new ActiveXObject('Microsoft.XMLHTTP') :
      	new XMLHttpRequest;

  	request.onreadystatechange = function() {
    	if (request.readyState == 4) {
      		request.onreadystatechange = doNothing;
      		callback(request, request.status);
    	}
  	};

  	request.open('GET', url, true);
  	request.send(null);
}

function doNothing() {}

//busca cep
function buscaCep() {
	$("#progressCep").removeClass("hide");
    // var cep = $(this).val();
    // cep = cep.replace(" ","");
    // cep = cep.replace("-","");
    var latitude = $('[name = "latitude"]').val();
    var longitude = $('[name = "longitude"]').val();

    // if (cep.length != 0) {
    //     if(cep.length != 8 || isNaN(cep)){
    //         alert("Digite o CEP corretamente!");
    //         return false;
    //     }else{
    //         var cep = $(this).val();
            $.ajax({
                url: "http://www.observatorioderesiduos.unb.br/cep/busca/" + latitude + "/" + longitude,/*MUDAR AQUI*/
                // url: "http://localhost/observatorio/cep/busca/" + latitude + "/" + longitude,/*MUDAR AQUI*/
                dataType: "html",
                type_return:"json",
                data_type:"json",
                success: function(r){
                    // console.log(r);
                    var obj = jQuery.parseJSON(r);
                    // console.log(obj);
                    if (r == '{}') {
                    	$("#progressCep, #coordenadasPrenchidas").addClass("hide");
                        alert("Local não encontrado!");
                        // alert("CEP não encontrado!");
                    } else {
                    	$("#cep").focus().val(obj['cep']);
                        $("#logradouro").focus().val(obj['logradouro']);
                        $("#cidade").focus().val(obj['cidade']);
                        $("#estado").focus().val(obj['estado']);
                        $("#bairro").focus().val(obj['bairro']);
                        // $("#field-latitude").val(obj['latitude']);
                        // $("#field-longitude").val(obj['longitude']);
                        $("#numero").focus();
                        $("#progressCep").addClass("hide");
                        $('#coordenadasPrenchidas').removeClass('hide');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //console.log(xhr.status);
                    //console.log(thrownError);
                    //console.log(xhr.responseText);
                    // alert("Erro ao buscar CEP!");
                    $("#progressCep, #coordenadasPrenchidas").addClass("hide");
                    alert("Erro ao buscar local!");
                }
            });
    //     }
    // }
}

/**/
function dicaForm(dica) {
	Materialize.toast(dica, 10000, 'rounded')
}


//]]>