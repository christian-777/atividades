<?php
include "conf.php";

cabecalho();

?>
<script>
    $(document).ready(function(){
        $.getJSON("seleciona_reserva_de_cardapio.php", function(g){
            var option="<option label='Selecione seu nome' />";
            $.each(g, function(indice, valor){
                option+="<option value='"+valor.id_reserva+"'> "+valor.nome+" </option>";
            });
            $("#select").html(option);
        });

        $("#select").change(function(){
            var id =$("#select").val();
            $.post("seleciona_reserva_de_cardapio.php",{"id":id}, function(g){
            var tabela="<table border='1'><td>nome cardapio</td><td>Nome comida</td><td>tipo comida</td><td>preço</td></tr>";
            $.each(g, function(indice, valor){
                tabela+="<tr><td>"+valor.nome_cardapio+"</td><td>"+valor.nome_comida+"</td><td>"+valor.tipo_comida+"</td><td>"+valor.preco_comida+"</td><td><button class='btn btn-danger remover'  value='"+valor.id_reserva+"'>Remover</button></td></tr>";
            });
            tabela+="</table>"
            $("#recebe").html(tabela);

                $(".remover").click(function(){
                    i = $(this).val();
                    c = "id_reserva";
                    t = "reserva";
                    p = {tabela: t, id:i, coluna:c}
                    $.post("remover.php",p,function(r){
                        if(r=='1'){                
                            $("#msg").html("Reserva removida com sucesso.");
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
    <legend>Reservas</legend>
    <br />
    <select id="select">
    <option label="Selecione seu nome" />
    </select>
    <div id="recebe">
        <h2>Escolha seu cardapio</h2>
    </div>
</fieldset>';

rodape();

?>