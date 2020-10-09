<?php
    include "conexao.php";

    $selectFamilia = "SELECT nome FROM familia";

    $resultadoFamilia = mysqli_query($conexao,$selectFamilia);
?>
<!DOCTYPE html>
<html lang="ptr-BR">
    <head>
        <meta charset="ISO-8859">
        <title> Tabela genêro - Filtro </title>
    </head>
    <body>
        <h3> Filtrar por: </h3> 
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

            echo '<table border="1">
                    <tr>
                        <th colspan="2" style="text-align:left">GENERO</th></tr>
                    <tr>
                        <th>Nome Cientifico</th>
                        <th>Familia</th>
                    </tr>
            ';

            while($linha = mysqli_fetch_assoc($resultado)){
                echo '<tr>
                        <td style="font-style:italic;">'.$linha["nome_cientifico"].'</td>
                        <td>'.$linha["nome"].'</td>
                    </tr>';
            }

            echo "</table>";
        ?>
    </body>
</html>

