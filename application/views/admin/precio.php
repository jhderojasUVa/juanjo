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
	            <li><a href="#">frases</a></li>
	            <li><a href="<?=base_url()?>index.php/admin/admin/precios">precios</a></li>
	        </ul>
	    </div>

	    <div class="clear"></div>
	    <!-- contenido -->
	    <br/>
	    <table width="100%" align="center">
				<form action="<?=base_url()?>index.php/admin/admin/precios" method="post">
				<input type="hidden" value="1" name="modificar" />
				<tr>
					<td><input type="text" name="precio" value="<?=$precio?>" placeholder="precio" style="width:840px;"/></td>
				</tr>
				<tr>
					<td align="center"><input type="submit" value="cambiar precio" name="enviar" class="boton_form"/></td>
				</tr>
				</form>
		</table>
	</div>
</div>

<div id="copyright">
	<a href="http://strascast.no-ip.info"><img src="http://strascast.no-ip.info/productos/strascast/img/strascast_font.png" height="10" alt="Copyright Strascast" /></a>
</div>
</body>
</html>