
<?php
include "conf.php";

cabecalho();
?>
<script>
    $(document).ready(function(){
        $("#nome").change(function(){
            $.getJSON("seleciona_cardapio.php", function(g){
            option="<option label='Cardapios Personalizados' />";
                $.each(g, function(indice, valor){
                    option+="<option value='"+valor.id_cardapio+"'> "+valor.nome_cardapio+" </option>";
                });
            $("#select").html(option);
            });
        });
    });
</script>
<?php
if(empty($_POST))
{
    echo'<form method="POST" action="form_reserva.php">
        <fieldset>
            <legend>Reservas</legend>
            <input type="text" name="nome" id="nome" required="required" placeholder="Nome do cliente"/>
            <br />
            <select id="select" name="select" required="required">
                <option label="Cardapios Personalizados" />
            </select>
            <input type="submit" value="cadastrar"/>
        </fieldset>
    </form>';
}
else
{
    include "insere_reserva.php";
}

rodape();

?>