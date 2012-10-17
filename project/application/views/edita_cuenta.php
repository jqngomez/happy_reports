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
<form action="<?php echo base_url()."cuentas/edita/";?>" method="post">
<div id="contenedor">
<input name="idCuenta" id="idCuenta" type="hidden" value="<?php echo $idCuenta;?>"/>
<p>
<label>Nombre:</label><input id="txtNombre" name="txtNombre" required="required" placeholder="Nombre de la cuenta(*)" value="<?php echo $datos_cuenta['nombre'];?>"/>
</p>
<p>
<label>Usuario:</label><input id="txtUsuario" name="txtUsuario" required="required" placeholder="Usuario(*)" value="<?php echo $datos_cuenta['usuario'];?>"/>
</p>
<p>
<label>Password:</label><input id="txtPassword" name="txtPassword" required="required" placeholder="Password(*)" value="<?php echo $datos_cuenta['password'];?>"/> 
</p>
<input type="submit" value="Agregar">
</div>
</form>
</body>
</html>