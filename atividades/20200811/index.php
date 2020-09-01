<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Exercício Compartilhado</title>
    </head>
    <style>
        #quadrado{
                border-style:solid;
                border-width:1px;
                width:500px;
                height:500px;
        }
        #quadrado2{
                border-style:solid;
                border-width:1px;
                width:500px;
                height:500px;
        }
        
    </style>
    <body>
        <script src="jquery-3.5.1.min.js"></script>
        <h3> Exercicio Compartilhado</h3>
		
        <img id="negrito" src="negrito.png" />
        <img id="italico" src="italico.png"/>
        <img id="sublinhado" src="sublinhado.png"/>
        
        <div id="quadrado"><textarea id = "campo" name = "campo" placeholder="Digite aqui" ></textarea></div>
		
        <div id="quadrado2"></div>
        <script>
            var negrito=0, italico=0, sublinhado=0;
            $("#campo").keyup(function(){
                $("#quadrado2").html($("#campo").val());
            });
            $("#negrito").click(function(){
                if(negrito==1){
                    negrito--;
                    $("#quadrado2").css("font-weight", "normal");
                }else{
                    negrito++;
                    $("#quadrado2").css("font-weight", "bold");
                }
            });
            $("#italico").click(function(){
                if(italico==1){
                    italico--;
                    $("#quadrado2").css("font-style", "normal");
                }else{
                    italico++;
                    $("#quadrado2").css("font-style", "italic");
                }
            });
            $("#sublinhado").click(function(){
                if(sublinhado==1){
                    sublinhado--;
                    $("#quadrado2").css("text-decoration", "none");
                }else{
                    sublinhado++;
                    $("#quadrado2").css("text-decoration", "underline");
                }
            });
        </script>
		
    </body>
</html>