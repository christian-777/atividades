<!DOCTYPE html>
<html>
    <head>
        <title>Trabalho</title>
        <meta charset="utf-8" />
        <script src="jquery-3.5.1.min.js"></script>
        <script>
        
        $(document).ready(function(){
            $("input").keyup(function(){
                
                var cidade =  $("input").val();
                cidade = cidade.toUpperCase();

                if(cidade.length == 1){
                    $("#tabela").html("<tr><td>Digite ao menos 2 caracteres para a sua busca.</td></tr>");
                }
                if(cidade.length > 1){
                    $("#tabela").html("");
                    var tabela = "";
                    tabela = $("#tabela").html();
                    $.getJSON("https://servicodados.ibge.gov.br/api/v1/localidades/distritos", function(d){
                        $.each(d, function(i, f){
                            r = f.nome.toUpperCase();
                            if(r.indexOf(cidade) > -1){
                                tabela += "<tr><td>"+r+"</td><td>"+f.municipio.microrregiao.mesorregiao.UF.sigla+"</td></tr>";
                                $("#tabela").html(tabela);
                            }
                        });
                    });
                }
            });
        });
        </script>
    </head>
    <body>
        <input type="text" name="cidade" id="cidade" placeholder="Digite a cidade a procurar..."/>
        <table id="tabela" border="1">
            <tr>
                <td>Digite o nome da cidade que deseja procurar informações</td>
            </tr>
        </table>
    </body>
</html>