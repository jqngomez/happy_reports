<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Registro de Clientes</title>
	<script src="<?php echo base_url()?>assets/jquery/js/jquery-1.8.2.js"></script>
	<script src="<?php echo base_url()?>assets/jquery/js/jquery-ui-1.9.0.custom.js"></script>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/jquery/css/jquery-ui-1.9.0.custom.css">
</head>


<body>
<form action="<?php echo base_url()."redes/edita/"?>" method="post">
<div id="contenedor">
<input name="idRed" id="idRed" type="hidden" value="<?php echo $idRed;?>"/>
<p>
<label>Nombre:</label><input id="txtNombre" name="txtNombre" required="required" placeholder="Nombre de la red social(*)" value="<?php echo $datos_red['nombre'];?>"/>
</p>

<input type="submit" value="Agregar">
</div>
</form>
</body>
</html>