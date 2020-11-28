<?php
include "conf.php";
include "script.php";
cabecalho();

?>
<script>
    $(document).ready(function(){
        lista_reserva();
    });
</script>
<?php
echo'<fieldset>
    <legend>Reservas</legend>
    <br />
    <div id="msg"></div>
    <br />
    <select id="select">
    <option label="Selecione seu nome" />
    </select>
    <div id="recebe">
        <h2>Escolha seu cardapio</h2>
    </div>
</fieldset>';
$titulo = "Alterar reserva";
$nome_form = "reserva.php";
include "modal.php";

rodape();

?>