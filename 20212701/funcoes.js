$(document).ready(function(){
    $("#btn").click(function(){
        var nome = $("#nome").val();
        var valor = $("#valor").val();
        $.post("cookies.php",{"nome":nome, "valor":valor},function(r){
            window.alert("Cookie cadastrado!!!");
            $("#nome").val("");
            $("#valor").val("");
            atualiza_cookie();
        });
    });

   
        $("#btn2").click(function(){
            
                var apagar = [];
                $("input[name='cookies']:checked").each(function() {
                    apagar.push($(this).val());
                });
            
                
                $.post("apaga_cookies.php",{"nomes":apagar},function(r){
                    window.alert("Cookie(es) Apagado(os)!!!");
                    atualiza_cookie();
                });
                
        });
        

    function atualiza_cookie(){
        $.getJSON("seleciona_cookies.php",function(r){
            var conteudo="";
            if(r==""){
                $("#recebe").html("");
            }
                console.log(r);
                $.each(r, function(i,v){
                    console.log(v);
                    conteudo+="<input type='checkbox' name='cookies' value='"+v+"'/> "+v+"<br />";
                });
                $("#recebe").html(conteudo);
            
        });
    }
    atualiza_cookie();

    
});