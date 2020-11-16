<?php
include "conf.php";

cabecalho();
//include "script_remover_aluno.php";

?>
<script>
    $(document).ready(function(){
        $.getJSON("seleciona_tipo.php", function(g){
            var lista="";
            $.each(g, function(indice, valor){
                lista+="<li>"+valor.tipo+" || <button class='btn btn-danger remover'  value='"+valor.id_tipo+"'>Remover</button>  </li>";
                });
            $("#lista").html(lista);
                $(".remover").click(function(){
                    i = $(this).val();
                    c = "id_tipo";
                    t = "tipo_comida";
                    p = {tabela: t, id:i, coluna:c}
                    $.post("remover.php",p,function(r){
                        if(r=='1'){                
                            $("#msg").html("Tipo de comida removido com sucesso.");
                            $("button[value='"+ i +"']").closest("li").remove();
                        }
                        else
                        {
                            $("#msg").html("Erro ao remover: este item nao pode ser removido pois esta ligado a outro item ainda cadastrado!!.");
                        }
                    });
                }); 
        });
    });
</script>
<?php
echo'<fieldset>
    <legend id="teste">Tipos de comidas</legend>
    <div id="msg"></div>
    <ul id="lista">

    </ul>
</fieldset>';

rodape();

?>