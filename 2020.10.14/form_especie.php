<?php
    include "conexao.php";

    $selectFamilia = "SELECT nome, id_familia FROM familia";

    $resultadoFamilia = mysqli_query($conexao,$selectFamilia);

?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="ISO-8859">
        <title> Tabela esp&eacutecie - Cadastro </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="estilo.min.css" />
        <script src="jquery-3.3.1.min.js"></script>
        <script>
                $(document).ready(function(){
                    $("select[name='familia']").change(function(){
                        familia = $("select[name='familia']").val();
                        
                        texto = "<select name='s_genero' id='s_genero'><option value=''> ::SELECIONE UM GENERO:: </option>";
                        $("select[name='s_genero']" ).prop( "disabled", false );
                        $.post("seleciona_genero.php",{'familia':familia},function(resultado){                   
                            $.each(resultado, function(indice, valor){
                                texto += '<option value = "'+valor.id_genero+'"> '+valor.nome_cientifico+' </option>';
                                console.log(texto);

                                $("#genero").html(texto);
                            });                                             
                        });
                        
                       
                    });    
                });
        </script>
    </head>
    <body>
        <div class="container-fluid">
            <?php
                include "menu.inc";
            ?>

            <center>
            <div class="form-generico col-sm-6">
                <h4 style="color:black; font-family:Consolas;"> CADASTRAR ESP&EacuteCIE: </h3> 
                <?php
                    if(empty($_POST)){
                        echo'
                            <form method = "POST" name="cadastro_genero">
                                <select name = "familia">
                                    <option value =""> ::SELECIONE UMA FAM&Iacute;LIA::</option>
                            ';
                            while($linhaFamilia = mysqli_fetch_assoc($resultadoFamilia)){
                                echo '<option value='.$linhaFamilia["id_familia"].'> '.$linhaFamilia["nome"].'</option>';
                            }
                        echo'
                                </select>
                                <br/><br/>

                                <div id="genero">
                                    <select name="s_genero" id="s_genero" disabled>
                                        <option value=""> ::SELECIONE UM GENERO:: </option>       
                                    </select>
                                </div>

                                <br/>

                                <input type="text" name="nome" placeholder =  "Nome..."/>
                                <br/><br/>
                                <input type="text" name="nome_cientifico" placeholder =  "Nome cientif&iacute;co..."/>
                                <br/><br/>
                                <input type="submit" value="Cadastrar"/>
                            </form>
                        ';
                    }else{
                        include "conexao.php";

                        $nome = $_POST["nome"];
                        $nome_cientifico = $_POST["nome_cientifico"];
                        $cod_genero = $_POST["s_genero"];
                        $query = "INSERT into especie(nome,nome_cientifico, cod_genero) values('$nome','$nome_cientifico','$cod_genero')";

                        mysqli_query($conexao, $query) or die($query);

                        echo'<p style="color:black; font-family:Consolas;"> ESP&EacuteCIE CADASTRADO! </p>';
                    }        
                ?>
            </div>
            </center>
        </div>
    </body>
</html>