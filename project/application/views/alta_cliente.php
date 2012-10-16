<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Registro de Clientes</title>
	<script src="<?php echo base_url()?>assets/jquery/js/jquery-1.8.2.js"></script>
	<script src="<?php echo base_url()?>assets/jquery/js/jquery-ui-1.9.0.custom.js"></script>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/jquery/css/jquery-ui-1.9.0.custom.css">
</head>
 <script>
    $(function() {
    	 $("#txtFechaInicio").datepicker();
    	 $( "#txtFechaInicio" ).datepicker("option", "dateFormat", "yy-mm-dd" );
    });
  </script>

<body>
<form action="<?php echo base_url()."clientes/alta/";?>" method="post">
<div id="contenedor">
<p>
<label>Nombre:</label><input id="txtNombre" name="txtNombre" required="required" placeholder="Nombre del cliente(*)"/>
</p>
<p>
<label>Giro:</label><input id="txtGiro" name="txtGiro" required="required" placeholder="Giro de la empresa(*)"/>
</p>
<p>
<label>Productos:</label><input id="txtProductos" name="txtProductos" required="required" placeholder="Productos(*)"/>
</p>
<p>
<label>Mercado potencial:</label><input id="txtMercadoPotencial" name="txtMercadoPotencial" placeholder="Mercado Potencial"/>
</p>
<p>
<label>Horario:</label><input id="txtHorario" name="txtHorario" required="required" placeholder="Horario laboral(*)"/>
</p>
<p>
<label>Telefono:</label><input id="txtTelefono" name="txtTelefono" required="required" placeholder="Telefono del cliente(*)"/>
</p>
<p>
<label>Direccion:</label><input id="txtDireccion" name="txtDireccion" placeholder="Direccion del cliente(*)"/>
</p>
<p>
<label>Correo Electronico:</label><input type="email" title="Ingresa un correo electronico." id="txtCorreoElectronico" name="txtCorreoElectronico" placeholder="example@example.com(*)"/>
</p>
<p>
<label>Sitio Web:</label><input id="txtSitioWeb" name="txtSitioWeb" placeholder="Pagina Web"/>
</p>
<p>
<label>Inicio:</label><input id="txtFechaInicio" name="txtFechaInicio" required="required" placeholder="Fecha de registro de FanPage(*)"/>
</p>
<h1>Datos de encargado</h1>
<p>
<label>Nombre:</label><input id="txtNombreEncargado" name="txtNombreEncargado" required="required" placeholder="Nombre del Encargado(*)"/>
</p>
<p>
<label>Apellido:</label><input id="txtApellidoEncargado" name="txtApellidoEncargado" required="required" placeholder="Apelldio del Encargado(*)"/>
</p>
<p>
<label>Correo Electronico:</label><input type="email" title="Ingresa un correo electronico." id="txtCorreoEncargado" name="txtCorreoEncargado" placeholder="Email del Encargado"/>
</p>
<p>
<label>Telefono:</label><input id="txtTelefonoEncargado" name="txtTelefonoEncargado" placeholder="Telefono del Encargado"/>
</p>
<p>
<label>Extencion:</label><input id="txtExtencion" name="txtExtencion" placeholder="Extencion"/>
</p>
<p>
<label>Skype:</label><input id="txtSkype" name="txtSkype" placeholder="Skype del encargado"/>
</p>
<p>
<label>Usuario:</label><input id="txtUsuario" name="txtUsuario" required="required" placeholder="Usuario(*)"/>
</p>
<p>
<label>Contrase&ntilde;a:</label><input id="txtPassword" name="txtPassword" required="required" placeholder="Contrase&ntilde;a(*)"/>
</p>
<p>
<label>Usuario:</label><select id="cmbUsuario" name="cmbUsuario" >
						<option value="1">1</option>
						</select>
</p>
<input type="submit" value="Agregar">
</div>
</form>
</body>
</html>