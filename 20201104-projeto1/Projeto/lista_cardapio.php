<?php
include "conf.php";

cabecalho();

?>
<script>
    $(document).ready(function(){
        $.getJSON("seleciona_cardapio.php", function(g){
            var option="<option label='Selecione um cardapio' />";
            $.each(g, function(indice, valor){
                option+="<option value='"+valor.id_cardapio+"'> "+valor.nome_cardapio+" </option>";
            });
            $("#select").html(option);
        });

        $("#select").change(function(){
            var id =$("#select").val();
            $.post("seleciona_cardapio_de_comidas.php",{"id":id}, function(g){
                console.log(g);
            var tabela="<table border='1'><td>Nome comida</td><td>tipo comida</td><td>preço</td></tr>";
            $.each(g, function(indice, valor){
                tabela+="<tr><td>"+valor.nome_comida+"</td><td>"+valor.tipo_comida+"</td><td>"+valor.preco_comida+"</td></tr>";
            });
            tabela+="</table>";
            $("#recebe").html(tabela);
        });
        });
    });
</script>
<?php
echo'<fieldset>
    <legend>Cardapios</legend>
    <br />
    <select id="select">
    <option label="Selecione um tipo de comida" />
    </select>
    <div id="recebe">
        <h2>Escolha o cardapio que deseja visualizar</h2>
    </div>
</fieldset>';

rodape();

?>