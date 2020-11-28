<?php

    include "conexao.php";

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $tipo_comida = $_POST["select"];

    $update = "UPDATE comida SET nome='$nome',
                                        preco='$preco',
                                        cod_tipo='$tipo_comida'
                            WHERE
                            id_comida='$id'";
    
    mysqli_query($con,$update)
        or die(mysqli_error($con));

    echo "1";
?>