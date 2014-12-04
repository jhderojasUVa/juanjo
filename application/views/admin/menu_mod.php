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
				<? 
				foreach ($plato as $row) { 
					$idplato = $row -> idplato;
					$plato = $row -> plato;
					$descripcio_plato = $row -> descripcion_plato;
					$odern = $row -> orden;
					$hidratos = $row -> hidratos;
					$calorias = $row -> calorias;
					$vegetariano = $row -> vegetariano;
					$fecha_ = explode($fecha,"-");
				} ?>
				<form action="<?=base_url()?>index.php/admin/admin/menu_cambiar" method="post" class="formulario">
				<input type="hidden" name="enviado" value="1">
				<input type="hidden" name="idplato" value="<?=$idplato?>">
				<input type="hidden" name="fecha" value="<?=$fecha?>">
				<tr>
					<td><input type="text" name="plato" placeholder="plato" value="<?=$plato?>" style="width:835px"/></td>
				</tr>
                <tr>
					<td><input type="text" name="descripcion" placeholder="descripcion del plato" value="<?=$descripcio_plato?>" style="width:835px"/></td>
				</tr>
				<tr>
					<td width="80">
					Hidratos <input type="text" name="hidratos" placeholder="10" value="<?=$hidratos?>" style="width:30px"/>
					&nbsp;&nbsp;&nbsp;
					Calorias <input type="text" name="calorias" placeholder="100" value="<?=$calorias?>" style="width:40px"/>
					&nbsp;&nbsp;&nbsp;
					Vegetariano <input type="checkbox" name="vegetariano" value="1" <? if ($vegetariano==1) { ?>checked="checked" <? } ?>/>
					</td>
				</tr>
                <tr>
					<td>
                   	 Posici&oacute;n en el menu
                     <select name="posicion">
                     	<? for ($i=1;$i<=3;$i++) { ?>
                     		<? if ($orden==$i) { ?>
	                     		<option selected value="<?=$i?>"><?=$i?> plato</option>
                     		<? } else { ?>
	                     		<option value="<?=$i?>"><?=$i?> plato</option>
                     		<? } ?>
                        <? } ?>
                        
                     </select>
                    </td>
				</tr>
                <tr>
                	<td>
                    Fecha
                    <select name="dia">
                    	<? for ($i=1;$i<=31;$i++) { ?>
                    		<? if ($i==$fecha_[2]) { ?>
                    			<option value="<?=$i?>" selected><?=$i?></option>
                    		<? } else { ?>
								<option value="<?=$i?>"><?=$i?></option>
							<? } ?>
                        <? } ?>
                    </select> / 
                    <select name="mes">
                    	<? for ($i=1;$i<=12;$i++) { ?>
                    		<? if ($i==$fecha_[1]) { ?>
                    			<option value="<?=$i?>" selected><?=$i?></option>
                    		<? } else { ?>
								<option value="<?=$i?>"><?=$i?></option>
							<? } ?>
                        <? } ?>
                    </select> / 
                    <select name="ano">
                    	<? for ($i=(date("Y")-1);$i<=(date("Y")+1);$i++) { ?>
	                        <? if ($i==$fecha_[0]) { ?>
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
						<input type="submit" name="enviar" value="modificar plato" class="boton_form"/>
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