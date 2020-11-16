<?php

    include "conexao.php";

    $tabela = $_POST["tabela"];
    $coluna = $_POST["coluna"];
    $id = $_POST["id"];

    $delete = "DELETE FROM $tabela WHERE $coluna='$id'";

    mysqli_query($con,$delete)
        or die("Erro: ".mysqli_error($con));

    echo "1";
?>