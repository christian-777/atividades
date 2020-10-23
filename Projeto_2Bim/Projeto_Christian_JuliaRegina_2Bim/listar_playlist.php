<?php
    function lista(){
        include "conexao.php";
        $select="SELECT playlist.nome as nome_playlist, musica.nome as nome_musica, banda.nome as nome_banda, musica.youtube as youtube FROM musica inner join banda inner join playlist inner join musica_playlist where banda.id_banda = musica.cod_banda and playlist.id_playlist = musica_playlist.cod_playlist and musica_playlist.cod_musica=musica.id_musica";

        $select .= " ORDER BY nome_playlist";

        $res=mysqli_query($con, $select) or die(mysqli_error($con));
        while($linha=mysqli_fetch_assoc($res)){
            echo'<b>Nome Playlist: '.$linha["nome_playlist"].'</b><p><b>Nome da musica: </b>'.$linha["nome_musica"].'(<b>'.$linha["nome_banda"].'</b>)</p>';
            echo'<p><b>LINK:</b> <p><iframe width="300px" height="300px" src="https://www.youtube.com/embed/'.$linha["youtube"].'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></p></p>';
        }
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="jquery-3.5.1.min.js"></script>
        <title>lista banda</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">
	    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script>
            $(document).ready(function(){
                    var id=0;
                    var option=""; 
                    $.post("seleciona_playlist.php",{"id":id}, function(g){ 
                        console.log(g);  
                            option = "<option label='Nome da playlist'/>";
                        $.each(g, function(indice, valor){
                            option +="<option value="+valor.id_playlist+">"+valor.nome+"</option>";
                        });
                        $("#select").html(option);
                    });

                    $("#select").change(function(){
                         id= $("#select").val();
                        $.post("seleciona_playlist.php",{"id":id}, function(g){
                        var lista="";      
                        console.log(g);
                        $.each(g, function(indice, valor){
                            lista +="<b>Nome Playlist: "+valor.playlist_nome+"</b><p><b>Nome Musica: </b>"+valor.nome_musica+"(<b>"+valor.nome_banda+"</b>)</p><p><b>LINK:</b> <p><iframe width='300px' height='300px' src='https://www.youtube.com/embed/"+valor.youtube+"' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></p></p>";
                        });
                        $("#recebe").html(lista);
                    });
                    });
            });
        </script>

    </head>
    <body>
        <?php
            include "cabecalho.php";
        ?>
        <div>
            <div>
                <div>
                <header>
                    <h1 class="text-center" class="img-fluid"></h1>
                    <h2 class="text-center"><b>Playlists</b></h2>
                </header>
                <form method="post">
                    <div class="form-group">
				        <div class="input-group" >
                            <select  id="select">
                                <option selected>Nome da playlist...</option>
                            </select>
                        </div>
                    </div>
                    <hr /><hr />      
        <div id="recebe" >
        <?php
            lista();
        ?>      
         </div>
            </div>
        </div>            
        </form>
        <script src="bootstrap.min.js"></script>
    </body>
</html>
