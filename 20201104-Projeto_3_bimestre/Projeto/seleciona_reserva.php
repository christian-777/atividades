
<?php 
    header("Content-Type: application/json");
    include "conexao.php";
        $id=$_POST["id"];
        $select="SELECT reserva.id_reserva as id_reserva, reserva.nome as nome, cardapio.id_cardapio as id_cardapio FROM reserva inner join cardapio on reserva.cod_cardapio=cardapio.id_cardapio where reserva.id_reserva='$id'";
    
        
    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>
