<?php
session_start();

    if(!empty($_POST)){
        include "conexao.php";
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sql = "SELECT id_usuario FROM usuarios
                    WHERE email='$email' AND senha='$senha'";
        
        $res = mysqli_query($con,$sql)
                    or die(mysqli_error($con));

        if(mysqli_num_rows($res)=="1"){

            $l = mysqli_fetch_assoc($res);
            $_SESSION["usuario"]=$l["id_usuario"];
            header("location: index.php");
        }
        else{
            header("location: index.php?erro=1");
           
        }
    }
?>