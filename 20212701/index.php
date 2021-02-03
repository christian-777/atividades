<!DOCTYPE>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <title>Atividade 4</title>
        <script src='js/jquery-3.5.1.min.js'></script>
        <script src='funcoes.js'></script>
    </head>
    <body>
        <fieldset>
            <legend>Escolha o nome e o valor do seu cookie:</legend>
            <form method="post">
                <input type="text" name="nome" id="nome" placeholder="Nome do cookie"/>
                <br />
                <input type="text" name="valor" id="valor" placeholder="Valor do cookie"/>
                <br />
                <input type="button" id="btn" value="cadastrar"/>
            </form>
        </fieldset>
        <fieldset>
            <legend>Escolha os cookies que deseja jogar fora:</legend>
            <form method="post" id="recebe">

            </form>
            <input type="button" id="btn2" value="apagar"/>
        </fieldset>
    </body>
</html>