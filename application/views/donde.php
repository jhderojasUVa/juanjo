<!DOCTYPE html>
<html lang="es">
<head>
<link href="<?=base_url()?>css/estilos.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,700|Jura:400,300,500' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<style>
#map-canvas {
	/*width: calc(100% - 320px);*/
	width: 100%;
	height: 320px;
	border: #999 1px solid;
}
</style>
<script>
var map;
var TILE_SIZE = 256;
var chicago = new google.maps.LatLng(41.655407,-4.715838);

function bound(value, opt_min, opt_max) {
  if (opt_min != null) value = Math.max(value, opt_min);
  if (opt_max != null) value = Math.min(value, opt_max);
  return value;
}

function degreesToRadians(deg) {
  return deg * (Math.PI / 180);
}

function radiansToDegrees(rad) {
  return rad / (Math.PI / 180);
}

/** @constructor */
function MercatorProjection() {
  this.pixelOrigin_ = new google.maps.Point(TILE_SIZE / 2,
      TILE_SIZE / 2);
  this.pixelsPerLonDegree_ = TILE_SIZE / 360;
  this.pixelsPerLonRadian_ = TILE_SIZE / (2 * Math.PI);
}

MercatorProjection.prototype.fromLatLngToPoint = function(latLng,
    opt_point) {
  var me = this;
  var point = opt_point || new google.maps.Point(0, 0);
  var origin = me.pixelOrigin_;

  point.x = origin.x + latLng.lng() * me.pixelsPerLonDegree_;

  // Truncating to 0.9999 effectively limits latitude to 89.189. This is
  // about a third of a tile past the edge of the world tile.
  var siny = bound(Math.sin(degreesToRadians(latLng.lat())), -0.9999,
      0.9999);
  point.y = origin.y + 0.5 * Math.log((1 + siny) / (1 - siny)) *
      -me.pixelsPerLonRadian_;
  return point;
};

MercatorProjection.prototype.fromPointToLatLng = function(point) {
  var me = this;
  var origin = me.pixelOrigin_;
  var lng = (point.x - origin.x) / me.pixelsPerLonDegree_;
  var latRadians = (point.y - origin.y) / -me.pixelsPerLonRadian_;
  var lat = radiansToDegrees(2 * Math.atan(Math.exp(latRadians)) -
      Math.PI / 2);
  return new google.maps.LatLng(lat, lng);
};

function createInfoWindowContent() {
  var numTiles = 1 << map.getZoom();
  var projection = new MercatorProjection();
  var worldCoordinate = projection.fromLatLngToPoint(chicago);
  var pixelCoordinate = new google.maps.Point(
      worldCoordinate.x * numTiles,
      worldCoordinate.y * numTiles);
  var tileCoordinate = new google.maps.Point(
      Math.floor(pixelCoordinate.x / TILE_SIZE),
      Math.floor(pixelCoordinate.y / TILE_SIZE));

  return [
    'Cafeteria Alfonso VIII'
  ].join('<br>');
}


function initialize() {
  var mapOptions = {
    zoom: 18,
    center: new google.maps.LatLng(41.655407, -4.715838)
  };
  map = new google.maps.Map(document.getElementById("map-canvas"),
      mapOptions);
  var coordInfoWindow = new google.maps.InfoWindow();
  coordInfoWindow.setContent(createInfoWindowContent());
  coordInfoWindow.setPosition(chicago);
  coordInfoWindow.open(map);

  google.maps.event.addListener(map, 'zoom_changed', function() {
    coordInfoWindow.setContent(createInfoWindowContent());
    coordInfoWindow.open(map);
  });
}

google.maps.event.addDomListener(window, "load", initialize);
</script>
<style>
html {
	background: url(<?=base_url()?>img/fondos/fondo<?=rand(1,5);?>.jpg) no-repeat center center fixed; 
  	-webkit-background-size: cover;
  	-moz-background-size: cover;
  	-o-background-size: cover;
  	background-size: cover;
}
</style>
<title>Cafeteria de la Residencia Alfonso VIII</title>
<meta name="description" content="Cafetería de la Residencia Universitaria Alfonso VIII, Valladolid. Donde podras encontrar menús sabrosos y un trato excepcional. Regentada por Juanjo, a quien querras ver.">
</head>
<body>
<div id="logo">
	Residencia Universitaria Alfonso VIII
</div>
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&appId=126825837330348&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div id="menu">
	<div id="centrado">
    	<ul>
        	<li><a href="<?=base_url()?>index.php/principal/donde">Donde estamos</a></li>
            <li><a href="<?=base_url()?>index.php/principal/menu">Menu de hoy</a></li>
            <li><a href="<?=base_url()?>index.php/principal/">Conoce a Juanjo</a></li>
        </ul>
    </div>
</div>
<div id="datos">
	<h1><span class="titulo">Localizanos</span></h1>
	<div id="map-canvas"></div>
    <a href="https://es.foursquare.com/v/cafeteria-residencia-alfonso-viii/5073d9afe4b0869fa096ef07"><img src="<?=base_url()?>img/foursquare-logo.png" alt="Foursquare" width="30" style="border:none" /></a>
    <h1><span class="titulo">Horario</span></h1>
    <p>Lunes a Sabado de 8AM a 16:30PM y 19PM a 20:30PM<br />Sabados de 10AM a 14AM<br/>Domingos <strong>cerrado</strong></p>
    <h1><span class="titulo">Reserva tu cena</span></h1>
    <p>En caso de que no puedas venir a las horas, puedes encargar tu bocadillo <a href="whatsapp://send?tel=555555555">enviandonos un Whatsapp <img src="<?=base_url()?>img/whatsapp-logo.png" alt="Whatsapp" height="17" /></a></p>
</div>
<div id="social">
	<a href="https://es.foursquare.com/v/cafeteria-residencia-alfonso-viii/5073d9afe4b0869fa096ef07"><img src="<?=base_url()?>img/foursquare-logo.png" alt="Foursquare" width="30" style="border:none" /></a><br/>
	<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    <br />
	<div class="fb-like" data-href="<?=base_url()?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
</div>
<div id="copyright">
	<a href="http://strascast.no-ip.info"><img src="http://strascast.no-ip.info/productos/strascast/img/strascast_font.png" height="10" alt="Copyright Strascast" /></a>
</div>
</body>
</html>