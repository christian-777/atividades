<script src='js/jquery-3.5.1.min.js'></script>
<script>
$(document).ready(function(){
    function volta(){
        window.location="index.php";
    }
    function limpa(){
        sessionStorage.setItem('permissao', "");
        volta();
    }
    limpa();  
});
</script>
<?php
session_start();
session_destroy();
//header("location: index.php");
?>