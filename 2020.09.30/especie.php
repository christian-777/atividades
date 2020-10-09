<?php
    include "conexao.php";

    $selectFamilia = "SELECT nome, id_familia FROM familia";

    $resultadoFamilia = mysqli_query($conexao,$selectFamilia);

?>
<!DOCTYPE html>
<html lang="ptr-BR">
    <head>
        <meta charset="ISO-8859">
        <title> Tabela espécie - Filtro </title>
        <script src="jquery-3.3.1.min.js"></script>
        <script>
                $(document).ready(function(){
                    $("select[name='familia']").change(function(){
                        familia = $("select[name='familia']").val();
                        
                        texto = "<select name='s_genero' id='s_genero'><option value=''> ::SELECIONE UM GENERO:: </option>";
                        $("select[name='s_genero']" ).prop( "disabled", false );
                        $.post("seleciona_genero.php",{'familia':familia},function(resultado){                   
                            $.each(resultado, function(indice, valor){
                                texto += '<option value = "'+valor.id_genero+'"> '+valor.nome_cientifico+' </option>';
                                console.log(texto);

                                $("#genero").html(texto);
                            });                                             
                        });
                        
                       
                    });    
                });
        </script>
    </head>
    <body>
        <h3> Filtrar por: </h3> 
        <form method = "POST" name="filtro">
            <select name = "familia">
                <option value =""> ::SELECIONE UMA FAM&Iacute;LIA::</option>
                <?php
                    while($linhaFamilia = mysqli_fetch_assoc($resultadoFamilia)){
                        echo '<option value='.$linhaFamilia["id_familia"].'> '.$linhaFamilia["nome"].'</option>';
                    }
                ?>
            </select>

            <br/><br/>

            <div id="genero">
                <select name="s_genero" id="s_genero" disabled>
                    <option value=""> ::SELECIONE UM GENERO:: </option>       
                </select>
            </div>
            <br/><br/>

            <input type="text" name="nome_cientifico" placeholder =  "Nome cientif&iacute;co..."/>
            <input type="submit" value="Pesquisar"/>
        </form>
        <br/> </hr>
        <?php
            include "conexao.php";

            $select = "SELECT especie.nome, especie.nome_cientifico as nome_cientifico_especie, genero.nome_cientifico 
                as nome_cientifico_genero, familia.nome_cientifico as nome_cientifico_familia FROM especie INNER JOIN genero 
                ON especie.cod_genero = genero.id_genero INNER JOIN familia ON genero.cod_familia = familia.id_familia";
            
            

            if(!empty($_POST)){     
                if($_POST["familia"]!=""){   
                    if(isset($_POST["s_genero"]) && $_POST["s_genero"]!=""){
                        $s_genero = $_POST["s_genero"];
        
                        $select .= " AND genero.id_genero = '$s_genero'";
                    }else{
                        $familia = $_POST["familia"];
        
                        $select .= " AND familia.id_familia = '$familia'";       

                    }         
                }
                if($_POST["nome_cientifico"]!=""){
                    $nome_cientifico = $_POST["nome_cientifico"];
                    
                    $select .= " WHERE especie.nome_cientifico like '%$nome_cientifico%'";
                } 
            }

            
            $resultado = mysqli_query($conexao,$select); 

            echo '<table border="1">
                    <tr>
                        <th colspan="4" style="text-align:left">ESPECIE</th></tr>
                    <tr>
                        <th>Nome</th>
                        <th>Nome Cientifico</th>
                        <th>Genero</th>
                        <th>Familia</th>
                    </tr>
            ';

            while($linha = mysqli_fetch_assoc($resultado)){
                echo '<tr>
                        <td>'.$linha["nome"].'</td>
                        <td style="font-style:italic;">'.$linha["nome_cientifico_especie"].'</td>
                        <td style="font-style:italic;">'.$linha["nome_cientifico_genero"].'</td>
                        <td style="font-style:italic;">'.$linha["nome_cientifico_familia"].'</td>
                    </tr>'; 
            }

            echo "</table>";
        ?>
    </body>
</html>
