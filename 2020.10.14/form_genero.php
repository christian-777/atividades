<?php
    include "conexao.php";

    $selectFamilia = "SELECT nome, id_familia FROM familia";

    $resultadoFamilia = mysqli_query($conexao,$selectFamilia);

?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="ISO-8859">
        <title> Tabela g&ecircnero - Cadastro </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="estilo.min.css" />
    </head>
    <body>
        <div class="container-fluid">
            <?php
                include "menu.inc";
            ?>

            <center>
            <div class="form-generico col-sm-6">
                <h4 style="color:black; font-family:Consolas;"> CADASTRAR G&EcircNERO: </h3> 
                
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
                                <input type="text" name="nome_cientifico" placeholder =  "Nome cientif&iacute;co..."/>
                                <input type="submit" value="Cadastrar"/>
                            </form>
                        ';
                    }else{
                        include "conexao.php";

                        $nome_cientifico = $_POST["nome_cientifico"];
                        $cod_familia = $_POST["familia"];

                        $query = "INSERT into genero(nome_cientifico, cod_familia) values('$nome_cientifico','$cod_familia')";

                        mysqli_query($conexao, $query) or die($query);

                        echo'<p style="color:black; font-family:Consolas;"> G&EcircNERO CADASTRADO! </p>';
                    }        
                ?>
            </div>
            </center>
        </div>
    </body>
</html>