<?php 
    header("Content-Type: application/json");
    include "conexao.php";
    if(!empty($_POST))
    {
        $id=$_POST["id"];
        $select="SELECT id_tipo, tipo, nome, id_comida, preco FROM tipo_comida inner join comida on tipo_comida.id_tipo=comida.cod_tipo where tipo_comida.id_tipo='$id'";
        
    }
    else
    {
        $select="SELECT comida.nome as nome, tipo, id_comida, preco FROM comida inner join tipo_comida on comida.cod_tipo=tipo_comida.id_tipo";

    }
    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>
