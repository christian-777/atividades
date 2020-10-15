<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="ISO-8859">
        <title> Tabela fam&iacutelia - Cadastro </title>
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
                <h4 style="color:black; font-family:Consolas;"> CADASTRAR FAM&IacuteLIA: </h3> 
                
                <?php
                    if(empty($_POST)){
                        echo'
                        <form method = "POST" name="cadastro_familia">
                            <input type="text" name="nome_familia" placeholder = "Nome Fam&iacute;lia..."/>
                            <input type="text" name="nome_cientifico" placeholder = "Nome cientif&iacute;co..."/>
                            <input type="submit" value="Cadastrar"/>
                        </form>
                        ';
                    }else{
                        include "conexao.php";

                        $nome = $_POST["nome_familia"];
                        $nome_cientifico = $_POST["nome_cientifico"];

                        $query = "INSERT into familia(nome, nome_cientifico) values('$nome','$nome_cientifico')";

                        mysqli_query($conexao, $query) or die($query);

                        echo'<p style="color:black; font-family:Consolas;"> FAM&IacuteLIA CADASTRADA! </p>';
                    }
                ?>                         
            </div>
            </center>
        </div>
    </body>
</html>