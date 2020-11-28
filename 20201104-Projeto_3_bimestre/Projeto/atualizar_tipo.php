<?php

    include "conexao.php";

    $id = $_POST["id"];
    $tipo = $_POST["tipo"];

    $update = "UPDATE tipo_comida SET tipo='$tipo' 
                            WHERE
                            id_tipo='$id'";
    
    mysqli_query($con,$update)
        or die(mysqli_error($con));

    echo "1";
?>