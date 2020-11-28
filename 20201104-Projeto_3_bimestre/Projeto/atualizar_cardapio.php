<?php

    include "conexao.php";

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $comidas = $_POST["comidas"];

    $update = "UPDATE cardapio SET nome='$nome'
                                        WHERE
                                        id_cardapio='$id'";

    mysqli_query($con,$update)
    or die(mysqli_error($con));


    $delete="DELETE FROM cardapio_comida where cod_cardapio='$id'";

    mysqli_query($con,$delete)
        or die(mysqli_error($con));
        

        for($i=0; $i<sizeof($comidas); $i++)
        {
          $insert = "INSERT INTO cardapio_comida(
                                          cod_comida, 
                                          cod_cardapio
                                          ) VALUES (
                                          '".$comidas[$i]."',
                                          '$id'
                    )";
            mysqli_query($con, $insert)
            or die(mysqli_error($con));
        }
    echo "1";
?>