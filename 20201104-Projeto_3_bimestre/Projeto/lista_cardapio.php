<?php
include "conf.php";

cabecalho();
include "script.php";
?>
<script>
    $(document).ready(function(){
        lista_cardapio();

        select_cardapio();
        check();
    });
</script>
<?php
echo'<fieldset>
    <legend>Cardapios</legend>
    <br />
    <div id="msg"></div>
    <select id="select">
    <option label="Selecione um tipo de comida"></option>
    </select>
    <div id="recebe">
        <h2>Escolha o cardapio que deseja visualizar</h2>
    </div>
</fieldset>';
$titulo = "Alterar Cardapio";
$nome_form = "cardapio.php";
include "modal.php";

rodape();

?>