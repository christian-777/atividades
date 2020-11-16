<?php
include "conf.php";

cabecalho();

?>
<script>
    $(document).ready(function(){
        $.getJSON("seleciona_tipo.php", function(g){
            var option="<option label='Selecione um tipo de comida' />";
            $.each(g, function(indice, valor){
                option+="<option value='"+valor.id_tipo+"'> "+valor.tipo+" </option>";
            });
            $("#select").html(option);
        });

        $.getJSON("seleciona_comida_tipo.php", function(g){
                var lista="";
                $.each(g, function(indice, valor){
                    lista+="<li>"+valor.nome+" || <button class='btn btn-danger remover'  value='"+valor.id_comida+"'>Remover</button> </li>";
                });
            $("#recebe").html(lista);

            $(".remover").click(function(){
                i = $(this).val();
                c = "id_comida";
                t = "comida";
                p = {tabela: t, id:i, coluna:c}
                $.post("remover.php",p,function(r){
                    if(r=='1'){                
                        $("#msg").html("Comida removida com sucesso.");
                        $("button[value='"+ i +"']").closest("li").remove();
                        }
                        else
                        {
                            $("#msg").html("Erro ao remover: este item nao pode ser removido pois esta ligado a outro item ainda cadastrado!!.");
                        }
                });
            }); 
        });

        $("#select").change(function(){
            var id =$("#select").val();
            $.post("seleciona_comida_tipo.php",{"id":id}, function(g){
                var lista="";
                $.each(g, function(indice, valor){
                    lista+="<li>"+valor.nome+"</li>";
                });
            $("#recebe").html(lista);
            });
        });
    });
</script>
<?php
echo'<fieldset>
    <legend>Tipos de comidas</legend><br />
    <div id="msg"></div>
    <select id="select">
    <option label="Selecione um tipo de comida" />
    </select>
    <ul id="recebe">
    </ul>
</fieldset>';

rodape();

?>