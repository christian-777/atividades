<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="ISO-8859">
        <title> Tabela espécie - Filtro </title>
    </head>
    <body>
    <h3> Filtrar por: </h3> 
        <form method = "POST" name="filtro">
            <input type="text" name="nome_cientifico" placeholder = "Nome ou nome cientifíco..."/>
            <input type="submit" value="Pesquisar"/>
        </form>
        <br> </hr>
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

            echo '<table border="1">
                    <tr>
                        <th colspan="2" style="text-align:left">FAMILIA</th></tr>
                    <tr>
                        <td>Nome</td>
                        <td>Nome Cientifico</td>
                    </tr>
            ';

            while($linha = mysqli_fetch_assoc($resultado)){
                echo '<tr>
                        <td>'.$linha["nome"].'</td>
                        <td style="font-style:italic;">'.$linha["nome_cientifico"].'</td>
                    </tr>';
            }

            echo "</table>";
        ?>
    </body>
</html>
        