<?php
    include "conexao.php";
    $tipo_comida = $_POST["tipo_comida"];
    
    $insert = "INSERT INTO tipo_comida(
                                    tipo 
                                ) VALUES (
                                    '$tipo_comida'
                                )";
    mysqli_query($con, $insert)
     or die(mysqli_error($con));
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Gênero inserido com sucesso!</strong>
    <a href="form_tipo_de_comida.php"> Clique para cadastrar outro gênero</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
?>