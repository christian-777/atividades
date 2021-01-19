<?php
    session_start();
    include "conexao.php";
    $email=$_POST["email"];
    $senha=$_POST["senha"];
    $senha=md5($senha);
    $select="SELECT nivel, descricao, email, senha, id_perfil, perfil.nome as nome FROM perfil INNER JOIN usuario on perfil.id=usuario.id_perfil INNER JOIN permissao on permissao.nivel=usuario.id_perfil WHERE email=? and senha=?";
    if($stmt = mysqli_prepare($con, $select)) { 

        mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
        

        mysqli_stmt_execute($stmt);
      

        $resultado = mysqli_stmt_get_result($stmt);
        
        
        if(mysqli_num_rows($resultado) == 1) {
            
            $l = mysqli_fetch_assoc($resultado);
            
            setcookie("CookieTeste",$l["id_perfil"] , time()+60);
            $_SESSION["id"]=$l["id_perfil"];
            $_SESSION["nome"]=$l["nome"];  
            $_SESSION["nivel"]=$l["nivel"];
            $_SESSION["desc"]=$l["descricao"];
            header("location:index.php");
        }
        else {
            
            header("location: erro.html");
        }
        mysqli_stmt_close($stmt);
        
    }
    else {
        echo "Houve um erro na preparação da consulta SQL:".mysqli_error($con);
    }
    mysqli_close($con);
    
  
?>