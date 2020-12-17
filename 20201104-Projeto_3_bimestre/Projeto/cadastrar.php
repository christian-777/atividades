<?php
session_start();

    if(!empty($_POST)){
        include "conexao.php";
        $nome=$_POST["nome_cad"];
        $email = $_POST["email_cad"];
        $senha = $_POST["senha_cad"];

        if(isset($_SESSION["permissao"]) && $_SESSION["permissao"]==1){
            $permissao=$_POST["permissao"];
        }
        else{
            $permissao=3;
        }

        $insert = "INSERT INTO usuarios(
                                        nome,
                                        email,
                                        senha, 
                                        permissao
                                    ) VALUES (
                                        '$nome',
                                        '$email',
                                        '$senha',
                                        '$permissao'
                                    )";
        mysqli_query($con, $insert)
        or die(mysqli_error($con));

            header("location: index.php?confirmacao=1");
        }
        else{        
            header("location: index.php?erro=2");
        }

    

?>