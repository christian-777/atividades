<?php
include "conf.php";

cabecalho();
include "script.php";


?>
<script>
$(document).ready(function(){
    lista_tipo();
});
</script>
<?php
echo'<fieldset>
    <legend id="teste">Tipos de comidas</legend>
    <div id="msg"></div>
    <ul id="lista">

    </ul>
</fieldset>';
$titulo = "Alterar Tipo Comida";
$nome_form = "tipo_comida.php";
include "modal.php";

rodape();

?>
