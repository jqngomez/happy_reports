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
        <?php echo @$error; ?>
        <form method="post" name="foo" class="fooClass" action="<?php echo  base_url() ?>usuarios/loginTest/">
            <input type="text" name="usuario" class="usuarioClass" id="usuarioId" placeholder="Usuario..." />
            <input type="password" name="pass" class="passClass" id="passId" placeholder="Password..." />
            <input type="submit" class="loginClass" id="loginId"/>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
