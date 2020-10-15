<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="ISO-8859">
        <title> Tabela esp&eacutecie - Filtro </title>
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
                    <input type="text" name="nome_cientifico" placeholder = "Nome cientif&iacute;co..."/>
                    <input type="submit" value="Pesquisar"/>
                </form>
                
                <br/> 
                
                <?php
                    include "conexao.php";

                    $select = "SELECT * FROM familia ";

                    if(!empty($_POST)){
                        $select .= " WHERE (1=1) ";
                    
                        if($_POST["nome_cientifico"]!=""){
                            $nome_cientifico = $_POST["nome_cientifico"];

                            $select .= " AND nome_cientifico like '%$nome_cientifico%' OR nome like '%$nome_cientifico%'";
                        }
                    }

                    $resultado = mysqli_query($conexao,$select);

                    echo '<table class="table table-light table-striped table-hover" width="50%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nome</th>
                                    <th>Nome Cientifico</th>
                                </tr>
                            </thead>
                    ';

                    while($linha = mysqli_fetch_assoc($resultado)){
                        echo '<tr>
                                <td>'.$linha["nome"].'</td>
                                <td style="font-style:italic;">'.$linha["nome_cientifico"].'</td>
                            </tr>';
                    }

                    echo "</table>";
                ?>
            </div>
            </center>
        </div>
    </body>
</html>
        