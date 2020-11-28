<?php
    echo'<form method="POST">
    <fieldset>
        <legend>Cardapio</legend>
        <input type="number" name="idcardapio" id="idcardapio" readonly="readonly" />
        <br />
        <div id="check"></div>
        <input type="text" name="nome" id="nome" required="required" placeholder="Nome do cardapio que deseja"/>
    </fieldset>
    </form>';
?>