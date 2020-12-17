<?php
include "conf.php";

cabecalho();
include "script.php";


?>
<script>
$(document).ready(function(){
    lista_usuario();
});
</script>
<?php
echo'<fieldset>
    <legend id="teste">Dados</legend>
    <div id="msg"></div>
    <div id="tabela">

    </div>
</fieldset>';
$titulo = "Alterar Dados";
$nome_form = "usuarios.php";
include "modal.php";

rodape();

?>
