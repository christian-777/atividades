<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">
        <script src="jquery-3.5.1.min.js"></script>

            <script>
                $(document).ready(function(){

                        $.post("seleciona_musica.php", function(g){
                            console.log(g);
                            var checkbox="";
                            $.each(g, function(indice, valor){
                                checkbox +="<input class='check' type='checkbox' value='"+valor.id_da_musica+"' name='musicas[]'> "+valor.nome_musica+"<strong> - "+valor.nome_banda+"</strong><br />";
                            });
                            $("#receptora").html(checkbox);
                          
                        });
                        
                });
            </script>
        <title>Cadastro playlist</title>
    </head>
    <body>
        <?php 
        include "cabecalho.php";
            if(empty($_POST))
            {
                echo'<div class="login-form col-xs-10 offset-xs-1 
            col-sm-6 offset-sm-3 col-md-4 offset-md-4">
            <header>
			    <h1 class="text-center" class="img-fluid"></h1>
			    <h2 class="text-center">Cadastre a sua <b>playlist</b></h2>
		    </header>
            <form action="form_playlist.php" method="post">
            <div class="form-group">
				<div class="input-group">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-music-note-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 13c0 1.105-1.12 2-2.5 2S7 14.105 7 13s1.12-2 2.5-2 2.5.895 2.5 2z"/>
                        <path fill-rule="evenodd" d="M12 3v10h-1V3h1z"/>
                        <path d="M11 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 16 2.22V4l-5 1V2.82z"/>
                        <path fill-rule="evenodd" d="M0 11.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 7H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 3H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    <input type="text" id="nome_playlist" name="nome_playlist" placeholder="Nome da playlist…. ">
                </div>
            </div>
            <div id="receptora">  
            </div>
            <footer>
                <div class="float-left">
                    <button type="submit" class="btn btn-primary">Cadastrar Playlist</button>
                </div>
            </footer>
            </form>
            </div>';
            }
            else
            {
                include "inserir_playlist.php";
            }
        ?>
        <script src="bootstrap.min.js"></script>
    </body>
</html>
