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
	<div id="vertical">
    	<form action="<?=base_url()?>index.php/admin/admin/index" accept-charset="utf-8" method="post">
        	<table width="100%">
            	<tr>
                	<td><p class="texto">Entrada</p></td>
                </tr>
            	<tr>
                	<td align="center" valign="center"><label for="usuario" style="display:none;">usuario</label><input type="text" id="usuario" name="usuario" width="100%" placeholder="usuario"></td>
                </tr>
                <tr>
                	<td align="center" valign="center"><label for="password" style="display:none;">password</label><input type="password" id="password" name="password" width="100%" placeholder="password"></td>
                </tr>
                <tr>
                	<td align="center" valign="center"><input type="submit" value="comprobar"></td>
                </tr>
            </table>
        </form>
    </div>
</div> 
<div class="clear"></div>
    <? if (isset($_SESSION)) {?>
	    <? if ($_SESSION["idu"]==0) { ?>
	    <div id="error">
	    	<p><strong>Error:</strong> <?=$error?></p>
	    </div>
	    <? } ?>
    <? } ?>
<div id="copyright">
	<a href="http://strascast.no-ip.info"><img src="http://strascast.no-ip.info/productos/strascast/img/strascast_font.png" height="10" alt="Copyright Strascast" /></a>
</div>
</body>
</html>