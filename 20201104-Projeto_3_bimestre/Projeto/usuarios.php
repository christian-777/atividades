<?php
    echo'<form method="POST" name="form" action="autenticacao.php">
            <input type="hidden" id="hid" name="hid" value="">
            <input type="text" name="nome"/>
            <br />
            <input type="email" name="email"  />
            <br />
            <input type="checkbox" name="troca" id="troca" value="1"/> Trocar senha
            <br />
            <div id="senhas"></div>
    </form>';
?>
<script src='js/jquery-3.5.1.min.js'></script>
<script>
    $(document).ready(function(){
        
        $("#troca").change(function(){
            if($("input[name='troca']").is(':checked')==true){
                <?php $_SESSION["senhas"]=1;?>
                sessionStorage.setItem("senha", 1);
               
                $("#senhas").html('<input type="password" id="senha" name="senha" placeholder="senha"/><br /><input type="password" name="confirma_senha" id="confirma_senha" placeholder="Confirmação de senha"/>');
                $("#troca").click(function(){
                    sessionStorage.setItem("senha", 0);
                    $("#senha").val("");
                    $("#confirma_senha").val("");
                    $("#senhas").html("");
                    <?php $_SESSION["senhas"]=2;?>
                });
            }
        });
        
    });
</script>