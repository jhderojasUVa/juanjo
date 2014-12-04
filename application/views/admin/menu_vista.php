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
	    <p>A continuaci&oacute; le aparece una lista con el menu de una fecha y/o las fechas para poder ver otros menus. Podrá modificar un plato, eliminarle, etc...</p>
	    <br />
	    <? if (isset($menu)) { ?>
	    	<table width="100%" align="center">
	    		<th>
	    			<td><strong>Orden</strong></td>
	    			<td><strong>Plato</strong></td>
	    			<td><strong>Descripci&oacute;n</strong></td>
	    			<td><strong>Vegetariano</strong></td>
	    			<td></td>
	    		</th>
	    	<? foreach ($menu as $row) { ?>
	    		<tr>
	    			<td></td>
		    		<td><?=$row -> orden?></td>
		    		<td><?=$row -> plato?></td>
		    		<td><?=$row -> descripcion_plato?></td>
		    		<td><? if ($row -> vegetariano == 1) { ?>SI<? } else {?>NO<? } ?></td>
		    		<td><span class="boton"><a href="<?=base_url()?>index.php/admin/admin/menu_del?id=<?=$row -> idplato?>&ok=1&fecha=<?=$fecha?>">borrar</a></span> <span class="boton"><a href="<?=base_url()?>index.php/admin/admin/menu_cambiar?id=<?=$row -> idplato?>&fecha=<?=$fecha?>">modificar</a></span></td>
	    		</tr>
	    	<? } ?>
	    	</table>
	    <? } ?>
		<table width="100%" align="center">
				<form action="<?=base_url()?>index.php/admin/admin/menu_vista" method="post" class="formulario"/>
				<input type="hidden" name="ver_menu" value="1">
                <tr>
                	<td>
                    Fecha
                    <select name="dia">
                    	<? for ($i=1;$i<=31;$i++) { ?>
                    		<? if ($i==date("d")) { ?>
                    			<option value="<?=$i?>" selected><?=$i?></option>
                    		<? } else { ?>
								<option value="<?=$i?>"><?=$i?></option>
							<? } ?>
                        <? } ?>
                    </select> / 
                    <select name="mes">
                    	<? for ($i=1;$i<=12;$i++) { ?>
                    		<? if ($i==date("m")) { ?>
                    			<option value="<?=$i?>" selected><?=$i?></option>
                    		<? } else { ?>
								<option value="<?=$i?>"><?=$i?></option>
							<? } ?>
                        <? } ?>
                    </select> / 
                    <select name="ano">
                    	<? for ($i=(date("Y")-1);$i<=(date("Y")+1);$i++) { ?>
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
						<input type="submit" name="enviar" value="Ver menu" class="boton_form"/>
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