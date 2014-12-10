<!DOCTYPE html>
<html lang="es">
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Raleway:400,700|Jura:400,300,500" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style>
html {
	background: url(img/fondos/fondo_mesa.jpg) no-repeat center center fixed; 
  	-webkit-background-size: cover;
  	-moz-background-size: cover;
  	-o-background-size: cover;
  	background-size: cover;
}

#taza {
	width: 80%;
	position: absolute;
	top: 20%;
	/*bottom: 0;*/
	left: 15%;
	text-align: center;
	margin: 0;
	padding: 0;
}

#taza .error404 {
	position: absolute;
	font: 15em "Jura", Arial;
	font-weight: 900;
	color: white;
	top: 0;
	left: 0;
	z-index: 255;
	text-shadow: #000 0px 0px 2px;
}
.textoerror404 {
	position: absolute;
	top: 0;
	left: 10;
	padding-bottom: 10px;
	padding-top: 10px;
	padding-left: 15px;
	padding-right: 15px;
	margin-bottom: 20px;
	width: auto;
	background-color: rgba(210,210,210,0.7);
	font: 14px "Jura", Arial;
	z-index: 255;
}
</style>
<script>
$(document).ready(function(){
	$(window).bind('resize', function(){
	    Cambiatamanyo();
	    }).trigger('resize');
});

function Cambiatamanyo(){
	//Standard height, for which the body font size is correct
	var preferredHeight = 720;
	//Base font size for the page
	var fontsize = 104;
	
	var displayHeight = $(window).width();
	var percentage = displayHeight / preferredHeight;
	var newFontSize = Math.floor(fontsize * percentage) - 5;
	$(".error404").css("font-size", newFontSize);
}
</script>
<title>Cafeteria de la Residencia Alfonso VIII</title>
<meta name="description" content="Cafetería de la Residencia Universitaria Alfonso VIII, Valladolid. Donde podras encontrar menús sabrosos y un trato excepcional. Regentada por Juanjo, a quien querras ver.">
</head>
<body>
<div id="logo">
	Residencia Universitaria Alfonso VIII
</div>
<div id="taza">
	<img src="img/fondos/taza_small.png" width="100%"/>
	<div class="error404">error404</div>
	<div class="textoerror404"><strong>Error404:</strong> P&aacute;gina no encontrada. <br /><?=$message?></div>
</div>
<div id="copyright">
	<a href="http://strascast.no-ip.info"><img src="http://strascast.no-ip.info/productos/strascast/img/strascast_font.png" height="10" alt="Copyright Strascast" /></a>
</div>
</body>
</html>