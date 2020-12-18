<?php
    session_start();
    include "conexao.php";

    if(isset($_SESSION["senhas"]) && $_SESSION["senhas"]==1){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $senha = md5($senha);
        $id= $_SESSION["usuario"];
        $update = "UPDATE usuarios SET nome='$nome',
                                    email='$email', 
                                    senha='$senha'
                            WHERE
                            id_usuario='$id'";
    }
    if(!isset($_SESSION["senhas"]) || $_SESSION["senhas"]!=1){
        $i="ola";
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $id= $_POST["id"];
        $update = "UPDATE usuarios SET nome='$nome',
                                    email='$email'
                            WHERE
                            id_usuario='$id'";
    }
    
    mysqli_query($con,$update)
        or die(mysqli_error($con));

    echo "1";
?>