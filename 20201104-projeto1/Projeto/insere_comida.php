<?php
    include "conexao.php";
    $comida = $_POST["comida"];
    $tipo = $_POST["select"];
    $preco = $_POST["preco"];
    
    $insert = "INSERT INTO comida(
                                    nome,
                                    cod_tipo,
                                    preco
                                ) VALUES (
                                    '$comida',
                                    '$tipo',
                                    '$preco'
                                )";
    mysqli_query($con, $insert)
     or die(mysqli_error($con));
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Gênero inserido com sucesso!</strong>
    <a href="form_genero.php"> Clique para cadastrar outro gênero</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
?>