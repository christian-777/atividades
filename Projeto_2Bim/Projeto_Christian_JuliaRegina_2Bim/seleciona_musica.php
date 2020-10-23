<?php 
    header("Content-Type: application/json");
    include "conexao.php";
    // Select pra verificar nas familias
    // Precisamos do nome da familia do nome cientifico selecionado

    $select="SELECT banda.cod_genero as cod_genero, banda.id_banda as id_banda, musica.id_musica as id_da_musica, musica.nome as nome_musica, banda.nome as nome_banda, genero.nome as nome_genero FROM musica INNER JOIN banda 
    on musica.cod_banda = banda.id_banda inner join genero where banda.cod_genero=genero.id_genero";

    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>
