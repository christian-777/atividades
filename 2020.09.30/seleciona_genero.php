<?php
   header('Content-Type: application/json');

    include "conexao.php";
    
    $familia = $_POST['familia'];

    $selectGenero = "SELECT nome_cientifico, id_genero FROM genero WHERE cod_familia = '$familia'";

    $resultadoGenero = mysqli_query($conexao,$selectGenero);

    while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
        $resultado[] = $linhaGenero;
    } 

    echo json_encode($resultado);
?>