
<?php
include "conf.php";

cabecalho();
?>
<script>
    $(document).ready(function(){
        $("#comida").change(function(){
            $.getJSON("seleciona_tipo.php", function(g){
                console.log("roi");
                option="<option label='Tipo de Comida' />";
                $.each(g, function(indice, valor){
                    option+="<option value='"+valor.id_tipo+"'> "+valor.tipo+" </option>";
                });
                $("#select").html(option);
            });
        });
    });
</script>
<?php
if(empty($_POST))
{
    echo'<form method="POST" action="form_comidas.php">
        <fieldset>
            <legend>Comidas</legend>
            <select id="select" name="select">
                <option label="Tipo de Comida" />
            </select>
            <input type="text" name="comida" id="comida" required="required" placeholder="ex: entrada, prato principal, desjejum, doce, salgado..."/>
            <br />
            <input type="text" name="preco" id="preco" required="required" placeholder="Preço"/>
            <input type="submit" value="cadastrar"/>
        </fieldset>
    </form>';
}
else
{
    include "insere_comida.php";
}

rodape();

?>