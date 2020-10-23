<?php 
    header("Content-Type: application/json");
    include "conexao.php";
    $id= $_POST["id"];
    // Select pra verificar nas familias
    // Precisamos do nome da familia do nome cientifico selecionado
    if($id !=0){
        $select="SELECT id_banda , nome FROM banda where cod_genero = '$id'";
    }
    else
    {
        $select="SELECT musica.nome as nome_musica, banda.cod_genero as cod_genero, banda.id_banda as id_banda, 
        banda.nome as nome_banda, genero.nome as nome_genero FROM banda inner join genero on banda.cod_genero=genero.id_genero 
        inner join musica on musica.cod_banda=banda.id_banda";
    }
    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>
