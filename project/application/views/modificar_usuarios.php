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
            $(document).ready(function() {
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
        <form method="post" name="formAltaUser" class="formAltaClass" action="<?php echo  base_url() ?>usuarios/modificar">
            <?php  foreach($usuarioData as $usuariosform){?>
            <input type="text" name="nombre" class="nombreClass" placeholder="Nombre..." value="<?php echo $usuariosform->nombre?>" required="required"/>
            <input type="text" name="apellido" class="apellidoClass" placeholder="Apellido..." value="<?php echo $usuariosform->apellido?>" required="required"/>
            <input type="text" name="usuario" class="usuarioClass" placeholder="Usuario..." value="<?php echo $usuariosform->usuario?>" required="required"/>
            <div class="error"></div>
            <input type="hidden" name="id" class="idClass" value="<?php echo $usuariosform->idUsuario?>"/>
            <select name="tipoUsuario">
                <?php  foreach($tipos as $tipo){ ?>
                <?php if($tipo->idTipo==$usuariosform->tipo_usuario){$checked="selected";}else{$checked="";}?>
                <option value="<?php echo $tipo->idTipo?>" <?php echo $checked; ?>><?php echo $tipo->tipo?></option>
                <?php } ?> 
            </select>
            <?php } echo $usuariosform->tipo_usuario;?> 
            <input type="submit" name="modificar" class="modificarClass"/>
            <input type="reset" name="Reset" class="resetClass"/>
        </form>
    </body>
</html>
