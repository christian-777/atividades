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
            var tabela="<table border='1'><td>Nome comida</td><td>tipo comida</td><td>preço</td></tr>";
            $.each(g, function(indice, valor){
                tabela+="<tr><td>"+valor.nome_comida+"</td><td>"+valor.tipo_comida+"</td><td>"+valor.preco_comida+"</td><td><button class='btn btn-danger remover'  value='"+valor.id_cardapio+"'>Remover</button></td></tr>";
            });
            tabela+="</table>";
            $("#recebe").html(tabela);
                $(".remover").click(function(){
                    i = $(this).val();
                    c = "id_cardapio";
                    t = "cardapio";
                    p = {tabela: t, id:i, coluna:c}
                    $.post("remover.php",p,function(r){
                        if(r=='1'){                
                            $("#msg").html("Cardapio removido com sucesso.");
                            $("button[value='"+ i +"']").closest("table").remove();
                            }
                            else
                            {
                                $("#msg").html("Erro ao remover: este item nao pode ser removido pois esta ligado a outro item ainda cadastrado!!.");
                            }
                    });
                }); 
            });
        });
    });
</script>
<?php
echo'<fieldset>
    <legend>Cardapios</legend>
    <br />
    <div id="msg"></div>
    <select id="select">
    <option label="Selecione um tipo de comida" />
    </select>
    <div id="recebe">
        <h2>Escolha o cardapio que deseja visualizar</h2>
    </div>
</fieldset>';

rodape();

?>