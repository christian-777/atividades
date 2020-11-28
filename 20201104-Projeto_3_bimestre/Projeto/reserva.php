<?php
    echo'<form method="POST">
    <fieldset>
        <legend>Reservas</legend>
        <input type="number" name="idreserva" id="idreserva" readonly="readonly"/>
        <br />
        <input type="text" name="nome" id="nome" required="required" placeholder="Nome do cliente"/>
        <br />
        <select id="selectreserva" name="selectreserva" required="required">
            <option label="Cardapios Personalizados" />
        </select>
        <input type="submit" value="cadastrar"/>
    </fieldset>
</form>';
?>