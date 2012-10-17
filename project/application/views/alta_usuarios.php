<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script src="<?php echo base_url()?>assets/jquery-1.8.0.js"></script>
        <script>
            $(document).ready(function(){
                $(".nombreClass").blur(function(){
                    if($(".nombreClass").val()==""){
                        $(".nombreClass").focus();
                    }
                });
               $(".apellidoClass").blur(function(){
                    $(".usuarioClass").val($(".nombreClass").val() + $(".apellidoClass").val());
                });
                
                $(".passwordConfirmClass").blur(function(){
                   if($(".passwordClass").val() != $(".passwordConfirmClass").val()){
                        $(".error").text("Contraseñas inválidas").css({'color':'red'});
                        $(this).val("");
                        $(".passwordClass").val("");
                    }
                    else if($(".passwordClass").val() == $(".passwordConfirmClass").val()){
                        $(".error").text("Contraseñas Correctas").css({'color':'green'});
                    }
                }); 
                $(".passwordConfirmClass").focus(function(){
                    $(".error").text("");
                });
                $(".resetClass").click(function(){
                    $(".error").text("");
                });
            });
        </script>
    </head>
    <body>
        <form method="post" name="formAltaUser" class="formAltaClass" action="<?php echo  base_url() ?>usuarios/guardarUsuarios">
            <input type="text" name="nombre" class="nombreClass" placeholder="Nombre..." required="required"/>
            <input type="text" name="apellido" class="apellidoClass" placeholder="Apellido..." required="required"/>
            <input type="text" name="usuario" class="usuarioClass" placeholder="Usuario..." required="required"/>
            <input type="password" name="password" class="passwordClass" placeholder="Password..." required="required"/>
            <input type="password" name="passwordConfirm" class="passwordConfirmClass" placeholder="Password..." required="required"/>
            <select name="tipoUsuario">
                <?php  foreach($tipos as $tipo){?>
                <option value="<?php echo $tipo->idTipo?>"><?php echo $tipo->tipo?></option>
                <?php } ?> 
            </select>
            <div class="error"></div>
            <input type="submit" name="Guardar" class="guardarClass"/>
            <input type="reset" name="Reset" class="resetClass"/>
            <br>
            <?php  foreach($usuariosData as $usuarios){?>
                <?php echo $usuarios->idUsuario." ".$usuarios->nombre." ".$usuarios->apellido." ".$usuarios->usuario." ".$usuarios->tipo_usuario." ".$usuarios->fecha." ".$usuarios->hora." ".$usuarios->status;?>
                <a href="<?php echo base_url() ?>usuarios/modificarUsuarios/<?php echo $usuarios->idUsuario;?>">modificar Usuario.</a>
                <a href="<?php echo base_url() ?>usuarios/modificarContrasenaView/<?php echo $usuarios->idUsuario;?>" >modificar Contraseña.</a>
                <?php if($usuarios->status==0){$check="";}else{$check = base_url()."usuarios/eliminarUsuarios/".$usuarios->idUsuario;} ?>
                <a href="<?php echo $check;?>">Eliminar</a>
                <br>
            <?php } ?>
            <a href="<?php echo base_url() ?>usuarios/cerrar">Cerrar sesi&oacute;n.</a>
        </form>
    </body>
</html>
