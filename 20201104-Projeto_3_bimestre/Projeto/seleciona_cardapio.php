<?php 
    header("Content-Type: application/json");
    include "conexao.php";

    if(!empty($_POST))
    {
        $id=$_POST["id"];
        $select="SELECT id_cardapio, cardapio.nome as nome_cardapio, comida.nome as nome_comida, comida.id_comida as id_comida
        FROM cardapio 
        inner join cardapio_comida on cardapio.id_cardapio=cardapio_comida.cod_cardapio 
        inner join comida on comida.id_comida=cardapio_comida.cod_comida
        where id_cardapio='$id'";
    }
    else{
        $select="SELECT id_cardapio, nome as nome_cardapio FROM cardapio";
    }
    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>
