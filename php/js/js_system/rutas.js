var ruta;
var pop;




    var map = L.map('map').fitWorld();
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);
    var punto_ini ;


    function onLocationFound(e) {
        // var radius = e.accuracy / 2;

        locationMarker = L.marker(e.latlng).addTo(map)
            .bindPopup('Tu estas aqui').openPopup();
        // locationCircle = L.circle(e.latlng, radius).addTo(map);
        punto_ini = e.latlng;
    }

    function onLocationError(e) {
        alert(e.message);
    }

    map.on('locationfound', onLocationFound);
    map.on('locationerror', onLocationError);

    map.locate({setView: true, maxZoom: 24});


 var vacio = L.icon({
    iconUrl: '../img/vacio.png',
    iconSize:     [61, 55], // size of the icon
    iconAnchor:   [29, 55], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});


var medio = L.icon({
    iconUrl: '../img/medio.png',
    iconSize:     [61, 55], // size of the icon
    iconAnchor:   [29, 55], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});


var lleno = L.icon({
    iconUrl: '../img/lleno.png',
    iconSize:     [61, 55], // size of the icon
    iconAnchor:   [29, 55], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
var inicio = L.icon({
    iconUrl: '../img/inicio.png',
    iconSize:     [61, 55], // size of the icon
    iconAnchor:   [29, 55], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
var fin = L.icon({
    iconUrl: '../img/fin.png',
    iconSize:     [61, 55], // size of the icon
    iconAnchor:   [29, 55], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});

function generar_ruta()
{
 // $('#modal_espera').modal('show');
 // $('#modal_espera').modal('hide'); 
    elimina();
  envio = $('#ddl_envios').val();
  puntos=[];
  mark = [];
  var parametros = {
    'envio':envio,
  }
    $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/mesasC.php?generar_ruta=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            console.log(response);
            puntos.push(punto_ini);
            puntos.push(L.latLng(response[0].latitud, response[0].longitud));

            mark.push(L.marker([response[0].latitud, response[0].longitud],{icon: fin},{draggable: false}).bindPopup('<b>'+response[0].nombre+'</b>').openPopup());
            pintar_puntos(puntos,mark);
        }
      });

}


   function pintar_puntos(puntos,popup=false)
    {
        ruta = L.Routing.control({
            waypoints:puntos,
            language: 'es', 
            // routeWhileDragging: true,
            draggableWaypoints: false,
        }).addTo(map);
        pop = L.layerGroup(popup).addTo(map);

    }

function elimina()
{
 if(ruta)
 {
    map.removeControl(ruta);
    map.removeControl(pop);
    map.removeControl(locationMarker);
 }                        
}


