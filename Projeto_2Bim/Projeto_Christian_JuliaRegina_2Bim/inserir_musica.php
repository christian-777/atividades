<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Banda</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body> 
<?php 
   
    include "conexao.php";
    $nome_playlist = $_POST["musica"];
    $banda = $_POST["banda"];
    $youtube = $_POST["youtube"];
   
        $insert = "INSERT INTO musica(
                                       nome,
                                       cod_banda,
                                       youtube
                                    ) VALUES (
                                        '$nome_playlist',
                                        '$banda',
                                        '$youtube'
                                    )";
        mysqli_query($con, $insert)
        or die(mysqli_error($con));
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Música inserida com sucesso!</strong>
    <a href="form_musica.php"> Clique para cadastrar outra música</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
?>
<script src="bootstrap.min.js"></script>
</body>
</html>
   
