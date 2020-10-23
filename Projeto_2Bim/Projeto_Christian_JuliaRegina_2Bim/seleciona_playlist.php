<?php 
    header("Content-Type: application/json");
    include "conexao.php";
    $id= $_POST["id"];
    // Select pra verificar nas familias
    // Precisamos do nome da familia do nome cientifico selecionado
    if($id !=0){
        $select="SELECT playlist.nome as playlist_nome,playlist.id_playlist, musica_playlist.cod_playlist, musica.nome as nome_musica,
         banda.nome as nome_banda, musica.youtube as youtube FROM musica inner join banda 
        on banda.id_banda = musica.cod_banda inner join musica_playlist on musica_playlist.cod_musica=musica.id_musica 
        inner join playlist on playlist.id_playlist = musica_playlist.cod_playlist 
        where playlist.id_playlist ='$id' ";
    }
    if($id == 0)
    {
        $select="SELECT id_playlist , nome FROM playlist";
    }
    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($linha=mysqli_fetch_assoc($res)){
        $r[]= $linha;
    }
    echo json_encode($r);
?>
