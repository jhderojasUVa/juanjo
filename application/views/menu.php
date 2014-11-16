<!DOCTYPE html>
<html lang="es">
<head>
<link href="<?=base_url()?>css/estilos.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,700|Jura:400,300,500' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
	<h1><span class="titulo">Menu de hoy</span></h1>
    <? if (count($menu) !=0) { ?>
    	<table width="100%">
    	<? $antiguo_pos = 0; ?>
        <? foreach ($menu as $row) { ?>
			<tr>
			<? $nuevo_pos = $row -> orden; ?>
            <? if ($antiguo_pos!=$nuevo_pos) { ?>
                <td class="fondo">De <?=$row -> orden?>&deg;</td>
                <? $antiguo_pos = $nuevo_pos; ?> 
            <? } else { ?>
            	<td></td>
            <? } ?>
            	<td class="fondo">
					<?=$row -> plato?>
                    <? if ($row -> descripcion !="") { ?>
                    	<br/><?=$row -> descripcion?>
                    <? } ?>
                </td>
            </tr>
        <? } ?>
        </table>
    <? } else { ?>
    	<p>¡Aun no hemos puesto nuestro menu!</p>
        <p>No, aun no hemos puesto nuestro menu, pero tranquilo que en breve podras ver las delicias que tienes hoy para llevarte a la boca.</p>
    <? } ?>
    <p>Precio del men&uacute; <?=$precio ?>&euro;</p>
    <h1><span class="titulo">Tambien tenemos...</span></h1>
    <p>Platos combinados, bocadillos, pinchos, tortilla de patatas...</p>
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