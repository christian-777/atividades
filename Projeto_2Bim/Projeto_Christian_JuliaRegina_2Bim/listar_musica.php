

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="jquery-3.5.1.min.js"></script>
        <title>lista musica</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">
	    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script>
            $(document).ready(function(){
                    $.getJSON("seleciona_musica.php", function(g){
                        var lista="";    
                      
                        $.each(g, function(indice, valor){
                            lista +="<ul><li>"+valor.nome_musica+ ": " +valor.nome_banda+  "<b>("+valor.nome_genero+")</b></li></ul>";
                        });
                        $("#lista").html(lista);
                    });

                        var id=0;
                    var option="";
                    $.getJSON("seleciona_genero.php", function(g){
                        option="<option label='Gênero da Banda' />";
                        $.each(g, function(indice, valor){
                            option+="<option value='"+valor.id_genero+"'> "+valor.nome+" </option>";
                        });
                        $("#genero").html(option);
                    });
                        $("#genero").change(function(){
                            var id=0;
                            var pega= $("#genero").val();
                            var option2="";
                            $.post("seleciona_banda.php", {"id":id}, function(b){
                                option2="<option label='Nome da Banda' />";
                                $.each(b, function(indice, valor){
                                    if(pega== valor.cod_genero)
                                    {
                                    option2+="<option value='"+valor.id_banda+"'> "+valor.nome_banda+" </option>";
                                    }
                                });
                                $("#banda").html(option2);
                            });
                        });
                


                    //FIM DA PRIMEIRA PARTE 


                    $("#genero").change(function(){
                        var v =  $("#genero").val();
                        id=0;
                        console.log(v);
                        var verificar=0;
                        $.post("seleciona_banda.php",{"id":id}, function(g){
                                var lista="";     
                                console.log(g);
                                $.each(g, function(indice, valor){

                                    if(v==valor.cod_genero)
                                    {
                                        lista +="<ul><li>"+valor.nome_musica+ ": " +valor.nome_banda+  "<b>("+valor.nome_genero+")</b></li></ul>";
                                    }
                                });
                                $("#lista").html(lista);
                        });

                        $("#banda").change(function(){
                        var value= $("#banda").val();
                        id=0;
                        verificar=1;
                            $.post("seleciona_banda.php",{"id":id},function(g){
                                var lista="";      
                                console.log(g);
                                $.each(g, function(indice, valor){
                                    if(verificar==2)
                                    {
                                         if(v==valor.cod_genero && nome.indexOf(value) > -1 && value==valor.id_banda)
                                        {
                                            lista +="<ul><li>"+valor.nome_musica+ ": " +valor.nome_banda+  "<b>("+valor.nome_genero+")</b></li></ul>";
                                        }
                                    }
                                    else
                                    {
                                        if(value==valor.id_banda && v==valor.cod_genero)
                                        {
                                            lista +="<ul><li>"+valor.nome_musica+ ": " +valor.nome_banda+  "<b>("+valor.nome_genero+")</b></li></ul>";
                                        }
                                    }
                                });
                            $("#lista").html(lista);
                            });
                        });

                        $("#musica").keyup(function(){
                        var values= $("#musica").val();
                        id=0;
                        verificar=2;
                        console.log(values);
                        $.post("seleciona_musica.php",function(g){
                            var lista="";      
                            console.log(g);
                            $.each(g, function(indice, valor){
                                var nome=valor.nome_musica;
                                var index=nome.indexOf(values);
                                console.log(index);
                                if(verificar==1)
                                {
                                     if(v==valor.cod_genero && nome.indexOf(values) > -1 && value==valor.id_banda)
                                    {
                                        lista +="<ul><li>"+valor.nome_musica+ ": " +valor.nome_banda+  "<b>("+valor.nome_genero+")</b></li></ul>";
                                    }
                                }
                                else
                                {
                                    if(nome.indexOf(values) > -1 && v==valor.cod_genero)
                                    {
                                        lista +="<ul><li>"+valor.nome_musica+ ": " +valor.nome_banda+  "<b>("+valor.nome_genero+")</b></li></ul>";
                                    }
                                }
                            });
                            $("#lista").html(lista);
                        });
                    });
                    });

                    //FIM DA SEGUNDA PARTE 
                    

                    

                        $("#banda").change(function(){
                            var value= $("#banda").val();
                            id=0;
                            var verificar=0;
                                $.post("seleciona_banda.php",{"id":id},function(g){
                                    var lista="";      
                                    console.log(g);
                                    $.each(g, function(indice, valor){
                    
                                            if(value==valor.id_banda)
                                            {
                                                lista +="<ul><li>"+valor.nome_musica+ ": " +valor.nome_banda+  "<b>("+valor.nome_genero+")</b></li></ul>";
                                            }
                                        
                                    });
                                $("#lista").html(lista);
                                });


                            $("#genero").change(function(){
                                var v =  $("#genero").val();
                                id=0;
                                console.log(v);
                                verificar=1;
                                $.post("seleciona_banda.php",{"id":id}, function(g){
                                    var lista="";     
                                    console.log(g);
                                    $.each(g, function(indice, valor){

                                        if(verificar==2)
                                        {
                                            if(value==valor.id_banda && nome.indexOf(values) > -1 && v==valor.cod_genero)
                                            {
                                                lista +="<ul><li>"+valor.nome_musica+ ": " +valor.nome_banda+  "<b>("+valor.nome_genero+")</b></li></ul>";
                                            }
                                        }
                                        else
                                        {
                                            if(value==valor.id_banda && v==valor.cod_genero)
                                            {
                                                lista +="<ul><li>"+valor.nome_musica+ ": " +valor.nome_banda+  "<b>("+valor.nome_genero+")</b></li></ul>";
                                            }
                                        }
                                    });
                                    $("#lista").html(lista);
                                });
                            });

                            $("#musica").keyup(function(){
                                var value= $("#musica").val();
                                id=0;
                                verificar=2;
                                console.log(value);
                                $.post("seleciona_musica.php",function(g){
                                    var lista="";      
                                    console.log(g);
                                    $.each(g, function(indice, valor){
                                        var nome=valor.nome_musica;
                                        var index=nome.indexOf(value);
                                        console.log(index);
                                        if(verificar==1)
                                        {
                                            if(value==valor.id_banda && nome.indexOf(values) > -1 && v==valor.cod_genero)
                                            {
                                                lista +="<ul><li>"+valor.nome_musica+ ": " +valor.nome_banda+  "<b>("+valor.nome_genero+")</b></li></ul>";
                                            }
                                        }
                                        else
                                        {
                                            if(nome.indexOf(values) > -1 && value==valor.id_banda)
                                            {
                                                lista +="<ul><li>"+valor.nome_musica+ ": " +valor.nome_banda+  "<b>("+valor.nome_genero+")</b></li></ul>";
                                            }
                                        }
                                    });
                                    $("#lista").html(lista);
                                });
                            });
                        });


                        //FIM DA TERCEIRA PARTE 

                        
                        

                                $("#musica").keyup(function(){
                                    var value= $("#musica").val();
                                    id=0;
                                    var verificar=0;
                                    console.log(value);
                                    $.post("seleciona_musica.php",function(g){
                                        var lista="";      
                                        console.log(g);
                                        $.each(g, function(indice, valor){
                                            var nome=valor.nome_musica;
                                            var index=nome.indexOf(value);
                                            console.log(index);
                                                if(nome.indexOf(values) > -1 )
                                                {
                                                    lista +="<ul><li>"+valor.nome_musica+ ": " +valor.nome_banda+  "<b>("+valor.nome_genero+")</b></li></ul>";
                                                }
                                        });
                                    $("#lista").html(lista);
                                    });


                                    $("#genero").change(function(){
                                        var v =  $("#genero").val();
                                        id=0;
                                        console.log(v);
                                        verificar=1;
                                        $.post("seleciona_banda.php",{"id":id}, function(g){
                                            var lista="";     
                                            console.log(g);
                                            $.each(g, function(indice, valor){

                                                if(verificar==2)
                                                {
                                                    if(nome.indexOf(values) > -1 && value==valor.id_banda && v==valor.cod_genero)
                                                    {
                                                        lista +="<ul><li>"+valor.nome_musica+ ": " +valor.nome_banda+  "<b>("+valor.nome_genero+")</b></li></ul>";
                                                    }
                                                }
                                                else
                                                {
                                                    if(nome.indexOf(values) > -1 && v==valor.cod_genero)
                                                    {
                                                        lista +="<ul><li>"+valor.nome_musica+ ": " +valor.nome_banda+  "<b>("+valor.nome_genero+")</b></li></ul>";
                                                    }
                                                }
                                            });
                                            $("#lista").html(lista);
                                        });
                                    });

                                    $("#banda").change(function(){
                                        var value= $("#banda").val();
                                        id=0;
                                        verificar=2;
                                        $.post("seleciona_banda.php",{"id":id},function(g){
                                            var lista="";      
                                            console.log(g);
                                            $.each(g, function(indice, valor){
                                                if(verificar==1)
                                                {
                                                    if(nome.indexOf(values) > -1 && value==valor.id_banda && v==valor.cod_genero)
                                                    {
                                                        lista +="<ul><li>"+valor.nome_musica+ ": " +valor.nome_banda+  "<b>("+valor.nome_genero+")</b></li></ul>";
                                                    }
                                                }
                                                else
                                                {
                                                    if(nome.indexOf(values) > -1 && value==valor.id_banda)
                                                    {
                                                        lista +="<ul><li>"+valor.nome_musica+ ": " +valor.nome_banda+  "<b>("+valor.nome_genero+")</b></li></ul>";
                                                    }
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
                    <h2 class="text-center"><b>Lista de Músicas Cadastrados</b></h2>
                </header>
                <form method="post">
                    <div class="form-group">
                        <div class="input-group" >
                            <select class="custom-select mr-sm-2" id="genero" class="text-center">
                                <option selected>Genero da Banda...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group" >
                            <select class="custom-select mr-sm-2" id="banda" class="text-center">
                                <option selected>Nome da Banda...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
				        <div class="input-group" >
                            <input type="text" id="musica" name="musica" placeholder="Filtrar pela musica.">
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

