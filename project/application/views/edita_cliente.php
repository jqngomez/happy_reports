<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Modificacion de Cliente</title>
</head>
<body>
<form action="<?php echo base_url()."clientes/edita/"?>" method="post">
<div id="contenedor">
<input type="hidden" value="<?php echo $idCliente;?>" id="idCliente" name="idCliente">
<div id="input">
<label>Nombre:</label><input id="txtNombre" name="txtNombre" value="<?php echo $datos_cliente['nombre'];?>"/>
</div>
<div id="input">
<label>Giro:</label><input id="txtGiro" name="txtGiro" value="<?php echo $datos_cliente['giro'];?>"/>
</div>
<div id="input">
<label>Productos:</label><input id="txtProductos" name="txtProductos" value="<?php echo $datos_cliente['productos'];?>"/>
</div>
<div id="input">
<label>Mercado potencial:</label><input id="txtMercadoPotencial" name="txtMercadoPotencial" value="<?php echo $datos_cliente['mercado_potencial'];?>"/>
</div>
<div id="input">
<label>Horario:</label><input id="txtHorario" name="txtHorario" value="<?php echo $datos_cliente['horario'];?>"/>
</div>
<div id="input">
<label>Telefono:</label><input id="txtTelefono" name="txtTelefono" value="<?php echo $datos_cliente['telefono'];?>"/>
</div>
<div id="input">
<label>Direccion:</label><input id="txtDireccion" name="txtDireccion" value="<?php echo $datos_cliente['direccion'];?>"/>
</div>
<div id="input">
<label>Correo Electronico:</label><input id="txtCorreoElectronico" name="txtCorreoElectronico" value="<?php echo $datos_cliente['correo'];?>"/>
</div>
<div id="input">
<label>Sitio Web:</label><input id="txtSitioWeb" name="txtSitioWeb" value="<?php echo $datos_cliente['sitio_web'];?>"/>
</div>
<div id="input">
<label>Inicio:</label><input id="txtFechaInicio" name="txtFechaInicio" value="<?php echo $datos_cliente['inicio'];?>"/>
</div>
<h1>Datos de encargado</h1>
<div id="input">
<label>Nombre:</label><input id="txtNombreEncargado" name="txtNombreEncargado" value="<?php echo $datos_cliente['nombre_encargado'];?>"/>
</div>
<div id="input">
<label>Apellido:</label><input id="txtApellidoEncargado" name="txtApellidoEncargado" value="<?php echo $datos_cliente['apellido_encargado'];?>"/>
</div>
<div id="input">
<label>Correo Electronico:</label><input id="txtCorreoEncargado" name="txtCorreoEncargado" value="<?php echo $datos_cliente['correo_encargado'];?>"/>
</div>
<div id="input">
<label>Telefono:</label><input id="txtTelefonoEncargado" name="txtTelefonoEncargado" value="<?php echo $datos_cliente['telefono_encargado'];?>"/>
</div>
<div id="input">
<label>Extencion:</label><input id="txtExtencion" name="txtExtencion" value="<?php echo $datos_cliente['extencion_encargado'];?>"/>
</div>
<div id="input">
<label>Skype:</label><input id="txtSkype" name="txtSkype" value="<?php echo $datos_cliente['skype_encargado'];?>"/>
</div>
<div id="input">
<label>Usuario:</label><input id="txtUsuario" name="txtUsuario" value="<?php echo $datos_cliente['usuario'];?>"/>
</div>
<div id="input">
<label>Contrase–a:</label><input id="txtPassword" name="txtPassword" value="<?php echo $datos_cliente['password'];?>"/>
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