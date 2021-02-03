<?php 
    header("Content-Type: application/json");
    if(isset($_COOKIE)){
        $v="";
        foreach($_COOKIE as $nome => $valor){
            $v[]=$nome;
        }
        echo json_encode($v);
    }
    
?>
