<?php
include "conf.php";

cabecalho();
include "script.php";
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
    <br /> '.$_SESSION["permissao"].'';
    if(!isset($_SESSION["permissao"]) || $_SESSION["permissao"]==2){
        echo'<select id="select">
        <option label="Selecione seu nome" />
        </select>';
    }
    echo'<div id="recebe">  
        <h2>Escolha seu cardapio</h2>
    </div>
</fieldset>';
$titulo = "Alterar reserva";
$nome_form = "reserva.php";
include "modal.php";

rodape();

?>