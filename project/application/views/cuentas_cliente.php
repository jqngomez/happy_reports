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
	#cuenta_red{
		width: 290px;
		display: inline-block;
	}
	
	#contenedor{
		width: 650px;
		background-color: red;
	}
</style>



<body>
<form action="<?php echo base_url()."cuentas/alta/";?>" method="post">
<input type="hidden" value="<?php echo $idCliente;?>" name="idCliente" id="idCliente">
<div id="contenedor">
<?php
	
	foreach ($redes as $red){
		$checked = false;
		$id = 0;
		$nombre = "";
		$usuario = "";
		$password = "";
		if($datos){
		foreach ($datos as $dato){
			if($dato->idRed==$red->idRed){
				$checked = true;
				$id = $dato->idCuenta;
				$nombre = $dato->nombre;
				$usuario = $dato->usuario;
				$password = $dato->password;
			}
		}
		}
	?>
<fieldset id="cuenta_red">
<legend><input type="checkbox" name="chk<?php echo $red->idRed;?>" <?php echo ($checked)? '"checked=true"':"";?>> - <?php echo $red->nombre;?> </legend>
<div id="registro-chk<?php echo $red->idRed;?>" class="registros">
<?php echo ($id>0)? "<input type='hidden' value='".$id."' name='cuenta".$red->idRed."'>" : "";?>
<p>
<label>Nombre:</label><input id="txtNombre<?php echo $red->idRed;?>" name="txtNombre<?php echo $red->idRed;?>" required="required" placeholder="Nombre de la cuenta(*)" <?php echo ($nombre=="")? "" : "value='".$nombre."'"?>/>
</p>
<p>
<label>Usuario:</label><input id="txtUsuario<?php echo $red->idRed;?>" name="txtUsuario<?php echo $red->idRed;?>" required="required" placeholder="Usuario(*)" <?php echo ($usuario=="")? "" : "value='".$usuario."'"?>/>
</p>
<p>
<label>Password:</label><input id="txtPassword<?php echo $red->idRed;?>" name="txtPassword<?php echo $red->idRed;?>" required="required" placeholder="Password(*)" <?php echo ($password=="")? "" : "value='".$password."'"?>/>
</p>
</div>

</fieldset>
<?php }?>
<input type="submit" value="Agregar">
</div>
</form>
</body>
</html>

<script>
	$(function() {
		$(".registros input").attr('disabled',true);
		$("input[type='checkbox']").change( function() {
			if($(this).attr('checked')=='checked'){
				$("#registro-"+$(this).attr("name")+" input").attr('disabled',false);
			}else{
				$("#registro-"+$(this).attr("name")+" input").attr('disabled',true);
				//$("#registro-"+$(this).attr("name")+" input").attr('value',"");
			}			 
		}); 
	});

</script>