<!DOCTYPE html>
<html lang="es">
<head>
<link href="<?=base_url()?>css/estilos.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>css/admin.css" rel="stylesheet" type="text/css" />
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
<title>Cafeteria de la Residencia Alfonso VIII -Usuarios registrados</title>
<meta name="description" content="Cafetería de la Residencia Universitaria Alfonso VIII, Valladolid. Donde podras encontrar menús sabrosos y un trato excepcional. Regentada por Juanjo, a quien querras ver.">
</head>
<body>
<div id="logo">
	Residencia Universitaria Alfonso VIII
</div>

<div id="centrado">
	<div id="contenido">
		<div id="menu_interior">
	    	<ul>
	        	<li><a href="<?=base_url()?>index.php/admin/admin/menu">menu</a></li>
	            <li><a href="<?=base_url()?>index.php/admin/admin/frases">frases</a></li>
	            <li><a href="<?=base_url()?>index.php/admin/admin/precios">precios</a></li>
	        </ul>
	    </div>
	    <div class="clear"></div>
	    <p>Desde aqu&iacute; podra controlar todo los aspectos dinamicos de su web.</p>
	    <p><strong>Menu</strong>: permite insertar/modificar y borrar los platos de los menus. Puede crear menus para cualquier fecha</p>
	    <p><strong>Frases</strong>: le permite añadir, cambiar o borrar las frases celebres de "Juanjo"</p>
	    <p><strong>Precios</strong>: precios de permite cambiar el precio del menu</p> 
	    <br />
	    <p><strong>Menu del dia de hoy</strong></p>
	    <? if (isset ($menu_hoy) && count($menu_hoy)!=0) { ?>
	    	<table width="550">
	    	<? foreach ($menu_hoy as $row) { ?>
	    			<tr>
		    			<td width="100">De <?=$row -> posicion?></td>
		    			<td><?=$row -> plato?></td>
	    			</tr>
	    	<? } ?>
	    	</table>
	    <? } else { ?>
	    <p>No hay menu para hoy.</p>
	    <? } ?>
	</div>
</div>

<div id="copyright">
	<a href="http://strascast.no-ip.info"><img src="http://strascast.no-ip.info/productos/strascast/img/strascast_font.png" height="10" alt="Copyright Strascast" /></a>
</div>
</body>
</html>