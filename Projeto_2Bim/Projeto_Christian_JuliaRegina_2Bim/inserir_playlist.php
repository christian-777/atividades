<?php 
   
    include "conexao.php";
    $nome_playlist = $_POST["nome_playlist"];
    $escolhas = $_POST["musicas"];

    $insert = "INSERT INTO playlist(
                                        nome
                                    ) VALUES (
                                        '$nome_playlist'
                                    )";
mysqli_query($con, $insert)
or die(mysqli_error($con));
    $r ="SELECT * FROM playlist";
   $id= mysqli_insert_id($con);
    for($i=0; $i<sizeof($escolhas); $i++)
    {
        $insert = "INSERT INTO musica_playlist(
                                       cod_musica,
                                       cod_playlist
                                    ) VALUES (
                                        '".$escolhas[$i]."',
                                        '$id'
                                    )";
        mysqli_query($con, $insert)
        or die(mysqli_error($con));
    }
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Playlist inserida com sucesso!</strong>
    <a href="form_playlist.php"> Clique para cadastrar outra playlist</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
?>
