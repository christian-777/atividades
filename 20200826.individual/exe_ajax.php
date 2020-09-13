<!DOCTYPE html>
<?php
    session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#btn").click(function(){
                    var fruta1 = $("input[name='fruta']").val();

                    if(fruta1 != ""){
                        $.get("exept2.php", {"fruta1":fruta1}, function(f){
                        if(f == 'true'){
                            $("#registrou").css("color", "red");
                            $("#registrou").html("Fruta já cadastrada");
                        }else{
                            $("#registrou").css("color", "green");
                            $("#registrou").html("Nova fruta cadastrada");

                            var HTML = $("#lista_frutas").html();
                            HTML = HTML + f;
                            $("#lista_frutas").html(HTML);
                        }
                    });
                    }  
                });
            });
        </script>
    </head>
<body>
    <input type="text" name="fruta" placeholder="Cadastre uma fruta..."/>
    <button id="btn">Cadastro Assincrono</button>
    <hr />
    <span id="registrou"></span>
    <hr />

    <ul id="lista_frutas">
        <?php
            if(isset($_SESSION["frutas"])){
                foreach($_SESSION["frutas"] as $fruta){
                    echo '<li>'.$fruta.'</li>';
                }
            }
        ?>
    </ul>
</body>
</html>