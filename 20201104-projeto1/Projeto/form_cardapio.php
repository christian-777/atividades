
<?php
include "conf.php";

cabecalho();
?>
<script>
    $(document).ready(function(){
        $.getJSON("seleciona_tipo.php", function(g){
            option="<option label='Tipo de Comida' />";
            $.each(g, function(indice, valor){
                option+="<option value='"+valor.id_tipo+"'> "+valor.tipo+" </option>";
            });
            $("#select").html(option);
        });

        $.getJSON("seleciona_comida_tipo.php", function(g){
            var checkbox="";
            $.each(g, function(indice, valor){
                checkbox +="<input class='check' type='checkbox' value='"+valor.id_comida+"' name='comidas[]'/> "+valor.nome+" ("+valor.tipo+") preço:"+valor.preco+"<br />";
            });
            $("#recebe").html(checkbox);              
        });
        $("#select").change(function(){
                var checkbox="";
                var id= $("#select").val();
                $.post("seleciona_comida_tipo.php", {"id":id},function(g){
                $.each(g, function(indice, valor){
                    if(id==valor.id_tipo)
                    {
                        checkbox +="<input class='check' type='checkbox' value='"+valor.id_comida+"' name='comidas[]'/> "+valor.nome+" ("+valor.tipo+") preço:"+valor.preco+"<br />";
                    }
                });
                $("#recebe").html(checkbox);    
            });  
        });
    });
</script>
<?php
if(empty($_POST))
{
    echo'<form method="POST" action="form_cardapio.php">
        <fieldset>
            <legend>Cardapio</legend>
            <select id="select" name="select" required="required">
                <option label="Tipo de Comida" />
            </select>
            <br />
            <input type="text" name="nome" id="nome" required="required" placeholder="Nome do cardapio que deseja"/>
            <input type="submit" value="cadastrar"/>
            <div id="recebe"></div>
        </fieldset>
    </form>';
}
else
{
    include "insere_cardapio.php";
}

rodape();

?>