<?php
session_start();
    if(!empty($_POST)){
        include "conexao.php";
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sql = "SELECT nome, id_usuario , permissao FROM usuarios
                    WHERE email='$email' AND senha='$senha'";
        
        $res = mysqli_query($con,$sql)
                    or die(mysqli_error($con));

        if(mysqli_num_rows($res)=="1"){

            $l = mysqli_fetch_assoc($res);
            $_SESSION["usuario"]=$l["id_usuario"];
            $_SESSION["permissao"]=$l["permissao"];
            $_SESSION["nome"]=$l["nome"];
            echo'<script src="js/jquery-3.5.1.min.js"></script>
            <script>
            $(document).ready(function(){
                function volta(){
                    window.location="index.php";
                }
                function aplica(){
                    sessionStorage.setItem("permissao","'.$l["permissao"].'");
                    sessionStorage.setItem("nome","'.$l["nome"].'");
                    volta();
                }
                aplica();  
            });</script>';
        }
        else{
            header("location: index.php?erro=1");
           
        }
    }
?>