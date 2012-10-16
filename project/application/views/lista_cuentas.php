<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Registro de Clientes</title>
	<script src="<?php echo base_url()?>assets/jquery/js/jquery-1.8.2.js"></script>
	<script src="<?php echo base_url()?>assets/jquery/js/jquery-ui-1.9.0.custom.js"></script>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/jquery/css/jquery-ui-1.9.0.custom.css">
</head>
<style>
	#tabla{
		width: 300px;
		background-color: red;
	}
	
	#nombre{
		width: 170px;
		display: inline-block;
	}
	
	#editar{
		width: 50px;
		display: inline-block;
	}
	
	#eliminar{
		width: 70px;
		display: inline-block;
	}
</style>


<body>
<ul>
<li><a href="<?php echo base_url()?>cuentas/nuevo/">Nuevo</a></li>
</ul>

<div id="tabla">
<div id="nombre">Nombre</div>
<div id="editar">Editar</div>
<div id="eliminar">Eliminar</div>
<?php 
foreach ($cuentas as $cuenta){ ?>
<div id="nombre"><?php echo $cuenta->nombre;?></div>
<div id="editar"><a href="<?php echo base_url().'cuentas/modificar/'.$cuenta->idCuenta;?>">MOD</a></div>
<div id="eliminar"><a href="<?php echo base_url().'cuentas/baja/'.$cuenta->idCuenta;?>">ELI</a></div>
<?php }?>
</div>
<ul>
<li><a href="<?php echo base_url()?>">Menu</a></li>
</ul>
</body>
</html>