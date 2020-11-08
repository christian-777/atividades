<?php
include "conf.php";

cabecalho();

?>
<script>
    $(document).ready(function(){
        $.getJSON("seleciona_tipo.php", function(g){
            var lista="";
            $.each(g, function(indice, valor){
                lista+="<li>"+valor.tipo+"</li>";
            });
            $("#lista").html(lista);
        });
    });
</script>
<?php
echo'<fieldset>
    <legend>Tipos de comidas</legand>
    <ul id="lista">

    </ul>
</fieldset>';

rodape();

?>