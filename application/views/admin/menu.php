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
	        	<li><a href="#">menu</a></li>
	            <li><a href="<?=base_url()?>index.php/admin/admin/frases">frases</a></li>
	            <li><a href="<?=base_url()?>index.php/admin/admin/precios">precios</a></li>
	        </ul>
	    </div>
	    <div id="sub_menu_interior">    
	        <ul>
	        	<li><a href="<?=base_url()?>index.php/admin/admin/menu/?opcion=1">añadir</a></li>
	        	<li>/</li>
	        	<li><a href="<?=base_url()?>index.php/admin/admin/menu/?opcion=2">ver todos los menus</a></li>
	        </ul>
	    </div>
	    <div class="clear"></div>
	    <!-- contenido -->
	    <? if ($opcion==0) { ?>
		    <? if (isset($menu_hoy) && count($menu_hoy)!=0) { ?>
		    <p><strong>Menu del d&iacute;a de hoy</strong></p>
		    	<table width="100%">
		    	<? foreach ($menu_hoy as $row) { ?>
		    			<tr>
			    			<td width="100">De <?=$row -> orden?></td>
			    			<td><?=$row -> plato?></td>
			    			<td><?=$row -> descripcion_plato ?></td>
			    			<td>Hidratos: <?=$row -> hidratos ?></td>
			    			<td>Calorias: <?=$row -> calorias ?></td>
			    			<td>Vegetariano: <? if ($row -> vegetariano == true) {?>SI<? } else {?>NO<? } ?></td>
		    			</tr>
		    	<? } ?>
		    	</table>
		    <? } else if (isset($menu_hoy)) { ?>
		    <p>No hay men&uacute; para hoy.</p>
		    <p>Para añadir un men&uacute; pulse sobre <strong>men&uacute;</strong> situado sobre estas letras.</p>
		    <? } ?>
		    <h1><span class="titulo">Ayuda</span></h1>
		    <p>Modifique o cree un menu nuevo desde este menu.</p>
		    <p>Recuerde que sus menus pueden contener tantos platos como usted quiera (multitud de primeros, segundos, terceros, cuartos...).</p>
		    <p>Pulse sobre <strong>añadir</strong> para añadir platos a un menu nuevo (normalmente al d&iacute;a de hoy, aunque puede ser a otro d&iacute;).</p>
		    <p>Pulse sobre <strong>ver todos los menus</strong> para mostrar todos los menus por orden inverso (del &uacute;ltimo al m&aacute;s viejo) para borrarlos o modificarlos.</p>
	    <? } ?>
	</div>
</div>

<div id="copyright">
	<a href="http://strascast.no-ip.info"><img src="http://strascast.no-ip.info/productos/strascast/img/strascast_font.png" height="10" alt="Copyright Strascast" /></a>
</div>
</body>
</html>