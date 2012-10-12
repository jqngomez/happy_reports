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
        <form method="post" name="formAltaUser" class="formAltaClass">
            <input name="nombre" class="nombreClass" placeholder="Nombre..."/>
            <input name="apellido" class="apellidoClass" placeholder="Apellido..."/>
            <input name="usuario" class="usuarioClass" placeholder="Usuario..."/>
            <input name="password" class="passwordClass" placeholder="Password..."/>
            <select name="tipoUsuario">
                <option value="tipoUsuario">
                <?php foreach($usuariosData as $usuarios){} ?> <option></option>
            </select>
            <input type="submit" name="Guardar" class="guardarClass"/>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
