<?php 
    header("Content-Type: application/json");
    include "conexao.php";
   
        $tipo=$_POST["id"];
        $select="SELECT cardapio.id_cardapio as id_cardapio, comida.nome as nome_comida, tipo_comida.tipo as tipo_comida, comida.preco as preco_comida from cardapio
         inner join cardapio_comida on cardapio.id_cardapio=cardapio_comida.cod_cardapio
          inner join comida on comida.id_comida=cardapio_comida.cod_comida
          inner join tipo_comida on tipo_comida.id_tipo=comida.cod_tipo
          where cardapio.id_cardapio='$tipo'";
        
    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>
