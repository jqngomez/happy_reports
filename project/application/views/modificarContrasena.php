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
                $(".passConfirmClass").blur(function(){
                    if($(".passNewClass").val() != $(".passConfirmClass").val()){
                        $(".error").text("Contraseña Incorrecta").css({'color':'red'});
                        $(".passNewClass").val("")
                        $(".passConfirmClass").val("")
                    }
                });
                $(".passLastClass").blur(function(){
                    var passLast=$(".passLastClass").attr('value');
                    var id=$(".passLastClass").attr('attrId');
                    //alert(passLast);
                    $.ajax({
	      		url: <?php echo "'".base_url()."usuarios/modificarContrasena/'";?>,
	      		type: 'post',
                        data: {passLast:passLast,id:id},
                        dataType: "json",
	                success: function(dato){
                            $(".passLastClass").val(passLast);
	                	//alert(dato);
                                if(dato==1){
                                        $(".passNewClass").attr("disabled",false);
                                        $(".passConfirmClass").attr("disabled",false);
                                        alert("Correcto"); 
                                }else if(dato!=1){
                                    alert("no existe");
                                    $(".passNewClass").attr("disabled",true);
                                    $(".passConfirmClass").attr("disabled",true);
                                }
	                 }
	      		});
                });
            });
        </script>
        
    </head>
    <body>
        <form method="post" name="foo" class="fooClass" action="<?php echo  base_url() ?>usuarios/contrasenaModificada/">
            <input type="password" name="passLast" class="passLastClass" id="passLast" attrId="<?php echo $id?>" placeholder="Password Viejo(*)" required />
            <input type="password" name="passNew" class="passNewClass" id="passNewId" placeholder="Password Nuevo(*)"   required/>
            <input type="password" name="passConfirm" class="passConfirmClass" id="passConfirmId" placeholder="Confirmar Password(*)"  required/>
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <div class="error"></div>
            <input type="submit" class="loginClass" id="loginId"/>
        </form>
    </body>
</html>
