//<![CDATA[
$(document).ready(function() {
	// $('#selectTipo').prepend('<option value="" disabled selected>Selecione</option>');
	// $('select').material_select();
	// $('.modal-trigger').leanModal();
	// $('[name = "latitude"], [name = "longitude"]').attr('length', 10);


	// Initialize collapse button
	$(".button-collapse").sideNav({
		menuWidth: 400 // Default is 240
		// edge: 'right', // Choose the horizontal origin
		// closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
		// draggable: true // Choose whether you can drag to open on touch screens
	});
	$(".fechaSidenav").bind("click", function() {
		$('.button-collapse').sideNav('hide');		
	});

	$(".abreMosaico").bind("click", function() {
		if (!$(this).hasClass('mosaicoAberto')) {
			$('.mosaico').removeClass('waves-effect waves-light btn-floating btn overYhide').addClass('mosaicoAberto');
			$('.fechaMosaico').removeClass('hide');
			$('.abreMenuIcon').addClass('hide');
			$('body').addClass('overYhide');
		}
	});

	$(".fechaMosaico").bind("click", function() {
		if ($('.mosaico').hasClass('mosaicoAberto')) {
			$('.mosaico').removeClass('mosaicoAberto').addClass('abreMosaico waves-effect waves-light btn-floating btn overYhide');
			$('.fechaMosaico').addClass('hide');
			$('.abreMenuIcon').removeClass('hide');
			$('body').removeClass('overYhide');
		}
	});
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  //$('.collapsible').collapsible();



  $('.modal').modal();

  $('ul.tabs').tabs('select_tab', 'test1');

});

function getLocation() {
	// if (navigator.geolocation) {
	//     navigator.geolocation.getCurrentPosition(showPosition);
	// } else {
	//     alert("Geolocalização não suportada por esse navegador.");
	// }
	showPosition('teste');
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
var myZoom = 11;

function initialize(myCenter) {

	var mapProp = {
		center: myCenter,
		zoom: myZoom,
		mapTypeControlOptions: {
	        position: google.maps.ControlPosition.TOP_RIGHT
    	},
    	streetViewControlOptions: {
	        position: google.maps.ControlPosition.RIGHT_CENTER
	    },
	    zoomControlOptions: {
        	position: google.maps.ControlPosition.RIGHT_CENTER
    	}
		// mapTypeId:google.maps.MapTypeId.ROADMAP
	};
	map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
	var infoWindow=new google.maps.InfoWindow;

	// markerPosicaoIncidente = new google.maps.Marker({
	// 	draggable: true,
	// 	position: myCenter, 
	// 	map: map,
	// 	title: "Local do Incidente"
	// });

	downloadUrl("get_markers/", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
        	//if (markers[i].getAttribute("tipo") == "azul") {
				var descricao = markers[i].getAttribute("descricao");
				var imagem = markers[i].getAttribute("imagem");
				var idTipo = markers[i].getAttribute("id_incidente");
				var tipo = markers[i].getAttribute("tipo_incidente");
				var idIncidente = markers[i].getAttribute("id_incidente");
				var totalEuVi = markers[i].getAttribute("total_confirmacoes_existencia");
				var point = new google.maps.LatLng(
					parseFloat(markers[i].getAttribute("lat")),
					parseFloat(markers[i].getAttribute("lng"))
				);
				var caminho = "https://www.observatorioderesiduos.unb.br";
				var imgCaminho = caminho + "/painel/assets/uploads/images/incidentes/" + imagem;
				var html = "<b>" + descricao + "</b><br/><img src='" + imgCaminho + "' alt='" + descricao + "' width='150'><br><i class='tiny icon material-icons'>visibility</i>" + totalEuVi;

				// "<a href='" + caminho + "/hit/total_confirmacoes/" + idIncidente + "/incidente' class='waves-effect waves-light btn'>Eu vi!</a>"

				// var icon = customIcons[tipo] || {}; //PERSONALIZAR PIN
				var marker = new google.maps.Marker({
					map: map,
					position: point
					// icon: icon.icon //PERSONALIZAR PIN
				});
				bindInfoWindow(marker, map, infoWindow, html, idIncidente);
			//}
        }
	});

    

    //centraliza o mapa na posição atual ao clicar
    google.maps.event.addDomListener(document.getElementById('btCentro'), 'click', function () {
		map.setCenter(myCenter);
		map.setZoom(myZoom);
	});

	$('.verNoMapa').on('click', function() {
		newCenter = new google.maps.LatLng($(this).attr('data-lat'), $(this).attr('data-lon'));
		map.setCenter(newCenter);
		map.setZoom(14);
	});

	// google.maps.event.addListenerOnce(map, 'idle', function() {
	// 	google.maps.event.trigger(map, 'resize');
	// });
	
}

google.maps.event.addDomListener(window, 'load', getLocation);
// google.maps.event.addDomListener(document.getElementById('abreMapa'), 'click', getLocation);

function fechaMapaReportar() {//chamada na view por onclick
	var latlng = markerPosicaoIncidente.getPosition();
    $('[name = "latitude"]').focus().val(latlng.lat().toFixed(6));
    $('[name = "longitude"]').focus().val(latlng.lng().toFixed(6));
	$('#mapa').closeModal();
	if ($('[name = "latitude"]').val() != '' && $('[name = "longitude"]').val() != '') {
		buscaCep();
	}
}

function bindInfoWindow(marker, map, infoWindow, html, idIncidente) {
	google.maps.event.addListener(marker, 'click', function() {
		//infoWindow.setContent(html);
    	//infoWindow.open(map, marker);
    	// $('.button-collapse').sideNav('show');
    	$('#modal1').modal('open');
    	if (!$('.abre_' + idIncidente).hasClass('active')) {
    		$('.abre_' + idIncidente).click();
    	}
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

//]]>