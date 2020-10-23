<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Gênero</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>  
<?php 
    include "conexao.php";
    $genero = $_POST["genero"];
    
    $insert = "INSERT INTO genero(
                                    nome 
                                ) VALUES (
                                    '$genero'
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
<script src="bootstrap.min.js"></script>
</body>
</html>
