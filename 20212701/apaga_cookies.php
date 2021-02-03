<?php
    $nomes=$_POST["nomes"];
    $i=0;
    for($i=0; $i<sizeof($nomes);$i++){
        setcookie($nomes[$i], "", time()-1);
        $i=1;
    }
    header("Location: index.php");
    if($i==0){
        echo 1;
    }
    else{
        echo 0;
    }
    
?>