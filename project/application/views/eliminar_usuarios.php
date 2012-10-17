<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <script>
        $(".usuarioClass").click(function(){
            confirm("¿Seguro que desea eliminar?");
        });
    </script>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Eliminar</title>
    </head>
    <body>
        <?php echo @$error; ?>
        <form method="post" name="formAltaUser" class="formAltaClass" action="<?php echo  base_url() ?>usuarios/eliminarUsuarios/2">
            <input name="usuario" class="usuarioClass" placeholder="Usuario..."/>
            <input type="submit" name="Eliminar" class="eliminarClass"/>
        </form>
    </body>
</html>
