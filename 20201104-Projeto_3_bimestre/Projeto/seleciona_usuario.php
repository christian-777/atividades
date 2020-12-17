<?php 
session_start();
    header("Content-Type: application/json");
    include "conexao.php";

    if(!empty($_POST))
    {
        $id=$_POST["id"];
        $select="SELECT nome, email FROM usuarios where id_usuario='$id'";
    }
    if(isset($_SESSION["permissao"]) && $_SESSION["permissao"]==1){
        $select="SELECT id_usuario, nome, email FROM usuarios";
    }
    if(isset($_SESSION["permissao"]) && $_SESSION["permissao"]==1 && !empty($_POST)){
        $id=$_POST["id"];
        $select="SELECT id_usuario, nome, email FROM usuarios where id_usuario='$id'";
    }
    if(isset($_SESSION["permissao"]) && $_SESSION["permissao"]!=1){
        $usuario=$_SESSION["usuario"];
        $select="SELECT nome, email FROM usuarios where id_usuario='$usuario'";
    }
    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>
