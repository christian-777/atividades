<!DOCTYPE html>
<html>
    <head>
        <title>Requisição para a API VIACEP</title>
        <meta charset="utf-8">
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function(){
                function limpa_form(){
                    $("#end").val("");
                    $("#num").val("");
                    $("#bairro").val("");
                    $("#cid").val("");
                    $("#est").val("");
                }
                
                $("#cep").blur(function(){
                    var cep = $(this).val().replace(/\D/g,'');
                    if(cep!=""){
                        var validacep = /^[0-9]{8}$/;
                        if(validacep.test(cep)){
                            $("#end").val("...");
                            $("#num").val("...");
                            $("#bairro").val("...");
                            $("#cid").val("...");
                            $("#est").val("...");

                            $.getJSON("https://viacep.com.br/ws/"+cep+"/json/?callback=?", function(d){
                                if(!("erro" in d)){
                                    $("#end").val(d.logradouro);
                                    $("#num").val(d.numero);
                                    $("#bairro").val(d.bairro);
                                    $("#cid").val(d.localidade);
                                    $("#est").val(d.uf);
                                    $("#num").focus();
                                }else{
                                    limpa_form();
                                    alert("CEP não encontrado.");
                                }
                            });
                        }else{
                            limpa_form();
                            alert("Formato de CEP inválido.");
                        }
                    }else{
                        limpa_form();
                    }
                });
            });
        </script>
    </head>
<body>
    <form method="get">
        <input type="number" name="cep" id="cep" placeholder="CEP..."/>
        <input type="text" name="end" id="end" placeholder="Endereço..."/>
        <input type="number" name="num" id="num" placeholder="Número..."/>
        <input type="text" name="bairro" id="bairro" placeholder="Bairro..."/>
        <input type="text" name="cid" id="cid" placeholder="Cidade..."/>
        <input type="text" name="est" id="est" placeholder="Estado..."/>
    </form>
</body>
</html>