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
	    <div id="sub_menu_interior">    
	        <ul>
	        	<li><a href="<?=base_url()?>index.php/admin/admin/frases/?opcion=1">añadir</a></li>
	        	<li>/</li>
	        	<li><a href="<?=base_url()?>index.php/admin/admin/frases/?opcion=2">ver todas frases</a></li>
	        </ul>
	    </div>
	    <div class="clear"></div>
	    <!-- contenido -->
	    <p>Para añadir una frase pulse sobre <strong>men&uacute;</strong> situado sobre estas letras.</p>
	    <? if (!isset($opcion)) { $opcion = 2; } ?>
	    <? if ($opcion==0) { ?>
	    	<h1><span class="titulo">Ayuda</span></h1>
	    	<p>Utilice el men&uacute; superior para añadir una frase.</p>
	    	<p>Si quiere modificar o borrar una frase, pulse sobre "ver todas frases", búsquelo y realice la opción oportuna con el.</p>
	    <? } ?>
	    <? if ($opcion==1) { ?>
	    <p>Rellene el siguiente formulario para insertar una nueva frase. Recuerde no escribir la frase muy larga ya que es un tip para atraer y no para poner anuncios.</p>
	    <br />
		<table width="100%" align="center">
				<form action="<?=base_url()?>index.php/admin/admin/frase_add" method="post" class="formulario">
				<tr>
					<td><input type="text" name="frase" placeholder="frase" style="width:835px"/></td>
				</tr>
				<tr>
					<td colspan="5" align="center">
						<input type="hidden" name="add" value="1" />
						<input type="submit" name="enviar" value="añadir frase" class="boton_form"/>
					</td>
				</tr>
				</form>
		</table>
	    <? } ?>
	    <? if ($opcion==2) { ?>
	    	<br />
	    	<? if (count($frases)!=0) { ?>
	    		<table width="100%" align="center">
	    			<? foreach ($frases as $row) { ?>
	    				<tr>
	    					<td><?=$row -> frase?></td>
	    					<td align="center"><span class="boton"><a href="<?=base_url()?>index.php/admin/admin/frase_borrar?id=<?=$row -> idfrase?>">borrar</a></span> <span class="boton"><a href="<?=base_url()?>index.php/admin/admin/frase_modificar?id=<?=$row -> idfrase?>">modificar</a></span></td>
	    				</tr>
	    			<? } ?>
	    		</table>
	    	<? } ?>
	    <? } ?>
	</div>
</div>

<div id="copyright">
	<a href="http://strascast.no-ip.info"><img src="http://strascast.no-ip.info/productos/strascast/img/strascast_font.png" height="10" alt="Copyright Strascast" /></a>
</div>
</body>
</html>