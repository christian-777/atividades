
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="jquery-3.5.1.min.js"></script>
        <title>Lista Banda</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">
	    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script>
            $(document).ready(function(){
                    var id= 0;
                    $.post("seleciona_banda.php", {"id":id}, function(g){
                        var lista="";      
                        $.each(g, function(indice, valor){
                            lista +="<ul><li>"+valor.nome_banda+ "-" +valor.nome_genero+  "</li></ul>";
                        });
                        $("#lista").html(lista);
                    });

                    $.post("seleciona_genero.php", function(g){
                        option="<option label='Gênero da Banda' />";
                        $.each(g, function(indice, valor){
                            option+="<option value='"+valor.id_genero+"'> "+valor.nome+" </option>";
                        });
                        $("#genero").html(option);
                    });


                    //FIM DA PRIMEIRA PARTE

                    $("#genero").change(function(){
                        var v =  $("#genero").val();
                        id=0;
                        console.log(v);
                        $.post("seleciona_banda.php",{"id":id}, function(g){
                                var lista="";      
                                console.log(g);
                                $.each(g, function(indice, valor){
                                    if(v==valor.cod_genero)
                                    {
                                        lista +="<ul><li>"+valor.nome_banda+ "-" +valor.nome_genero+  "</li></ul>";
                                    }
                                });
                                $("#lista").html(lista);
                        });

                        $("#banda").keyup(function(){
                        var value= $("#banda").val();
                        id=0;
                        console.log("teste");
                            $.post("seleciona_banda.php",{"id":id},function(g){
                                var lista="";      
                                console.log(g);
                                $.each(g, function(indice, valor){
                                    var nome=valor.nome_banda;
                                    var index=nome.indexOf(value);
                                    console.log(index);
                                    if(nome.indexOf(value) > -1 && (v==valor.cod_genero))
                                    {
                                        lista +="<ul><li>"+valor.nome_banda+ "-" +valor.nome_genero+  "</li></ul>";
                                    }
                                });
                            $("#lista").html(lista);
                            });
                        });
                    });


                    //FIM DA SEGUNDA PARTE


                    $("#banda").keyup(function(){
                    var value= $("#banda").val();
                    id=0;
                    console.log(value);
                        $.post("seleciona_banda.php",{"id":id},function(g){
                            var lista="";      
                            console.log(g);
                            $.each(g, function(indice, valor){
                                var nome=valor.nome_banda;
                                var index=nome.indexOf(value);
                                console.log(index);
                                if((nome.indexOf(value)) > -1)
                                {
                                    lista +="<ul><li>"+valor.nome_banda+ "-" +valor.nome_genero+  "</li></ul>";
                                }
                            });
                            $("#lista").html(lista);
                        });

                        $("#genero").change(function(){
                            var v =$("#genero").val();
                            id=0;
                            $.post("seleciona_banda.php",{"id":id},function(g){
                                var lista="";      
                                console.log(g);
                                $.each(g, function(indice, valor){
                                    var nome=valor.nome_banda;
                                    var index=nome.indexOf(value);
                                    if(nome.indexOf(value)> -1  && (v==valor.cod_genero))
                                    {
                                        lista +="<ul><li>"+valor.nome_banda+ "-" +valor.nome_genero+  "</li></ul>";
                                    }
                                });
                                $("#lista").html(lista);
                            });
                        });
                    });
                    
            });
        </script>



    </head>
    <body>
        <?php
            include "cabecalho.php";
        ?>
        <div class="login-form col-xs-1 offset-xs-1
            col-sm-2 offset-sm-5 col-md-2 offset-md-5">
            <div class="form-row align-items-center">
                <div class="col-auto my-2">
                <header>
                    <h1 class="text-center" class="img-fluid"></h1>
                    <h2 class="text-center"><b>Lista de Bandas Cadastrados</b></h2>
                </header>
                <form method="post">
                    <div class="form-group">
                        <div class="input-group" >
                            <select class="custom-select mr-sm-2" id="genero" class="text-center">
                                <option selected>Gênero da Banda...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
				        <div class="input-group" >
                            <input type="text" id="banda" name="banda" placeholder="Filtrar pela banda...">
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                    </div>
                    <hr /><hr />      
        <div id="lista" class="text-center">
       
         </div>
            </div>
        </div>            
        </form>
        <script src="bootstrap.min.js"></script>
    </body>
</html>


