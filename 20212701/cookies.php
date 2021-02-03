<?php
     header("Content-Type: application/json");
     
     $nome=$_POST["nome"];
     $valor=$_POST["valor"];

     setcookie($nome, $valor, time()+3600*2);
     echo 1;
?>