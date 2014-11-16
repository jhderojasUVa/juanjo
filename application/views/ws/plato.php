<!DOCTYPE html>
<html lang="es">
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
	// Recargamos el frame del menu recargando su controlador
	$(".frame[name='menu']").contents().find("html").load("<?=base_url()?>index.php/admin/ws/recargar_menu");
});
</script>
</head>
<body>
</body>
</html>