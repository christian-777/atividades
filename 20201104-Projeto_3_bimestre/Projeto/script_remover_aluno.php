<script>

    $(function(){
       $("#remover").click(function(){
           i = $(this).val();
           c = "id_tipo";
           t = "tipo_comida";
           p = {tabela: t, id:i, coluna:c}
           $.post("remover.php",p,function(r){
            if(r=='1'){                
                $("#msg").html("Tipo de comida removido com sucesso.");
                $("button[value='"+ i +"']").closest("ul").remove();
            }
           });
       }); 
    });

</script>

