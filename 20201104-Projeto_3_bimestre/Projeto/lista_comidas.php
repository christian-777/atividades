<?php
include "conf.php";

cabecalho();
include "script.php";

?>
<script>
    $(document).ready(function(){
        lista_comida();
        selects_comidas();
    });
</script>
<?php
echo'<fieldset>
    <legend>Comidas</legend><br />
    <div id="msg"></div>
    <select id="select" required="required">
    
    </select>
    <ul id="recebe">
    </ul>
</fieldset>';
$titulo = "Alterar Comida";
$nome_form = "comida.php";
include "modal.php";

rodape();

?>