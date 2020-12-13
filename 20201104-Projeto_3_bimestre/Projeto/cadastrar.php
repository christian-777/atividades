<?php


    if(!empty($_POST)){
        include "conexao.php";
        $nome=$_POST["nome_cad"];
        $email = $_POST["email_cad"];
        $senha = $_POST["senha_cad"];

        $insert = "INSERT INTO usuarios(
                                        nome,
                                        email,
                                        senha, 
                                        permissao
                                    ) VALUES (
                                        '$nome',
                                        '$email',
                                        '$senha',
                                        '2'
                                    )";
        mysqli_query($con, $insert)
        or die(mysqli_error($con));

            header("location: index.php?confirmacao=1");
        }
        else{        
            header("location: index.php?erro=2");
        }

    

?>