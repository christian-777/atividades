<?php
    include "conexao.php";

    $selectFamilia = "SELECT nome FROM familia";

    $resultadoFamilia = mysqli_query($conexao,$selectFamilia);
?>
<!DOCTYPE html>
<html lang="ptr-BR">
    <head>
        <meta charset="ISO-8859">
        <title> Tabela gen&ecircro - Filtro </title>
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
                <h4 style="color:black; font-family:Consolas;"> FILTRAR POR: </h3> 
        
                <form method = "POST" name="filtro">
                    <select name = "familia">
                        <option value =""> ::SELECIONE UMA FAM&Iacute;LIA::</option>
                        <?php
                            while($linhaFamilia = mysqli_fetch_assoc($resultadoFamilia)){
                                echo '<option value='.$linhaFamilia["nome"].'> '.$linhaFamilia["nome"].'</option>';
                            }
                        ?>
                    </select>
                    <br/><br/>
                    <input type="text" name="nome_cientifico" placeholder =  "Nome cientif&iacute;co..."/>
                    <input type="submit" value="Pesquisar"/>
                </form>
                <br/> </hr>
                <?php
                    $select = "SELECT genero.nome_cientifico, familia.nome FROM genero INNER JOIN familia ON genero.cod_familia = familia.id_familia";
                    
                    if(!empty($_POST)){
                        $select .= " WHERE (1=1) ";
                    
                        if($_POST["nome_cientifico"]!=""){
                            $nome_cientifico = $_POST["nome_cientifico"];

                            $select .= " AND genero.nome_cientifico like '%$nome_cientifico%'";
                        }

                        if($_POST["familia"]!=""){
                            $familia = $_POST["familia"];

                            $select .= " AND familia.nome like '%$familia%'";
                        }
                    }

                    $resultado = mysqli_query($conexao,$select);

                    echo '<table class="table table-light table-striped table-hover" width="50%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nome Cientifico</th>
                                    <th>Familia</th>
                                </tr>
                            </thead>
                    ';

                    while($linha = mysqli_fetch_assoc($resultado)){
                        echo '<tr>
                                <td style="font-style:italic;">'.$linha["nome_cientifico"].'</td>
                                <td>'.$linha["nome"].'</td>
                            </tr>';
                    }

                    echo "</table>";
                ?>
            </div>
            </center>
        </div>
    </body>
</html>

