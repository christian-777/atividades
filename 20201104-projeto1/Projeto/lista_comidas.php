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
                    lista+="<li>"+valor.nome+"</li>";
                });
            $("#recebe").html(lista);
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
    <select id="select">
    <option label="Selecione um tipo de comida" />
    </select>
    <ul id="recebe">
    </ul>
</fieldset>';

rodape();

?>