<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            foreach ($usuarios as $usuarioFila) {
                echo $usuarioFila->idUsuario;
                echo "<a href='http://localhost/happy_reports/project/usuarios/eliminarUsuarios/$usuarioFila->idUsuario>Eliminar</a>";
                echo "<a href='http://localhost/happy_reports/project/usuarios/modificarUsuarios/$usuarioFila->idUsuario>Modificar</a>";
            }
        ?>
        <a href="<?php base_url() ?>/usuarios/cerrar">Cerrar</a>
    </body>
</html>
