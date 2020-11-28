<?php
    include "conexao.php";
    $comidas = $_POST["comidas"];
    $nome = $_POST["nome"];
    
    $insert = "INSERT INTO cardapio(
                                  nome
                                  ) VALUES (
                                  '$nome'
                )";

    mysqli_query($con, $insert)
        or die(mysqli_error($con));
        $id= mysqli_insert_id($con);
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


    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Cardapio inserido com sucesso!</strong>
    <a href="form_cardapio.php"> Clique para cadastrar outro cardapio</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
?>