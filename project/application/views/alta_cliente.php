<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registro de Clientes</title>
</head>
<body>
<form action="<?php echo base_url()."clientes/alta/"; ?>method="post">
<div id="contenedor">
<div id="input">
<label>Nombre:</label><input id="txtNombre" name="txtNombre"/>
</div>
<div id="input">
<label>Giro:</label><input id="txtGiro" name="txtGiro"/>
</div>
<div id="input">
<label>Productos:</label><input id="txtProductos" name="txtProductos"/>
</div>
<div id="input">
<label>Mercado potencial:</label><input id="txtMercadoPotencial" name="txtMercadoPotencial"/>
</div>
<div id="input">
<label>Horario:</label><input id="txtHorario" name="txtHorario"/>
</div>
<div id="input">
<label>Telefono:</label><input id="txtTelefono" name="txtTelefono"/>
</div>
<div id="input">
<label>Direccion:</label><input id="txtDireccion" name="txtDireccion"/>
</div>
<div id="input">
<label>Correo Electronico:</label><input id="txtCorreoElectronico" name="txtCorreoElectronico"/>
</div>
<div id="input">
<label>Sitio Web:</label><input id="txtSitioWeb" name="txtSitioWeb"/>
</div>
<div id="input">
<label>Inicio:</label><input id="txtFechaInicio" name="txtFechaInicio"/>
</div>
<h1>Datos de encargado</h1>
<div id="input">
<label>Nombre:</label><input id="txtNombreEncargado" name="txtNombreEncargado"/>
</div>
<div id="input">
<label>Apellido:</label><input id="txtApellidoEncargado" name="txtApellidoEncargado"/>
</div>
<div id="input">
<label>Correo Electronico:</label><input id="txtCorreoEncargado" name="txtCorreoEncargado"/>
</div>
<div id="input">
<label>Telefono:</label><input id="txtTelefonoEncargado" name="txtTelefonoEncargado"/>
</div>
<div id="input">
<label>Extencion:</label><input id="txtExtencion" name="txtExtencion"/>
</div>
<div id="input">
<label>Skype:</label><input id="txtSkype" name="txtSkype"/>
</div>
<div id="input">
<label>Usuario:</label><input id="txtUsuario" name="txtUsuario"/>
</div>
<div id="input">
<label>Contrase–a:</label><input id="txtPassword" name="txtPassword"/>
</div>
<div id="input">
<label>Usuario:</label><select id="cmbUsuario" name="cmbUsuario">
						<option value="1">1</option>
						</select>
</div>
<input type="submit" value="Agregar">
</div>
</form>
</body>
</html>