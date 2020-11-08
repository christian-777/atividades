<?php 
    //header("Content-Type: application/json");
    include "conexao.php";
   
        $tipo=$_POST["id"];
        $select="SELECT comida.nome as nome_comida, tipo_comida.tipo as tipo_comida, comida.preco as preco_comida from cardapio
         inner join comida on cardapio.cod_comida=comida.id_comida
          inner join tipo_comida on comida.cod_tipo=tipo_comida.id_tipo and cardapio.cod_tipo=tipo_comida.id_tipo 
          inner join cardapio_comida on cardapio_comida.cod_cardapio=cardapio.id_cardapio and cardapio_musica.cod_comida=comida.id_comida 
          where cardapio.id_cardapio='$tipo'";
        
    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>
