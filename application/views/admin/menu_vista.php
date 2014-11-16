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
	    <p>Rellene el siguiente formulario para insertar un plato en el menu. Por defecto, la fecha es la de hoy, pero puede modificarla si lo desea</p>
	    <br />
	    <table width="100%" align="center">
	    	<tr>
	    		<td>Fecha</td>
	    		<td>
	    			<select name="dia">
	    			</select>
	    		</td>
	    	</tr>
	    </table>
		<table width="100%" align="center">
				<form action="<?=base_url()?>index.php/admin/admin/menu_add" method="post" class="formulario"/>
                <tr>
                	<td>
                    Fecha
                    <select name="dia">
                    	<? for ($i=1;$i++;$i==31) { ?>
                    		<? if ($i==date("d")) { ?>
                    			<option value="<?=$i?>" selected><?=$i?></option>
                    		<? } else { ?>
								<option value="<?=$i?>"><?=$i?></option>
							<? } ?>
                        <? } ?>
                    </select> / 
                    <select name="mes">
                    	<? for ($i=1;$i++;$i==12) { ?>
                    		<? if ($i==date("m")) { ?>
                    			<option value="<?=$i?>" selected><?=$i?></option>
                    		<? } else { ?>
								<option value="<?=$i?>"><?=$i?></option>
							<? } ?>
                        <? } ?>
                    </select> / 
                    <select name="ano">
                    	<? for ($i=(date("Y")-1);$i++;$i=(date("Y")+1)) { ?>
	                        <? if ($i==date("Y")) { ?>
	                    			<option value="<?=$i?>" selected><?=$i?></option>
	                    		<? } else { ?>
									<option value="<?=$i?>"><?=$i?></option>
								<? } ?>
	                        <? } ?>
                    </select>
                    </td>
                </tr>
				<tr>
					<td colspan="5" align="center">
						<input type="hidden" name="add" value="1" />
						<input type="submit" name="enviar" value="añadir frase" class="boton_form"/>
					</td>
				</tr>
				</form>
		</table>
	    <div class="clear"></div>
	</div>
</div>

<div id="copyright">
	<a href="http://strascast.no-ip.info"><img src="http://strascast.no-ip.info/productos/strascast/img/strascast_font.png" height="10" alt="Copyright Strascast" /></a>
</div>
</body>
</html>