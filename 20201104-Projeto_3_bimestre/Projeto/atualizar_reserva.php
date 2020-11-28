<?php

    include "conexao.php";

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $select = $_POST["select"];

    $update = "UPDATE reserva SET nome='$nome',
                                        cod_cardapio='$select'
                            WHERE
                            id_reserva='$id'";
    
    mysqli_query($con,$update)
        or die(mysqli_error($con));

    echo "1";
?>