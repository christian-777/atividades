<?php
echo'<form method="POST">
        <fieldset>
            <legend>Tipos de Comida</legend>
            id do tipo da comida:<input type="number" name="idtipo" id="idtipo" readonly="readonly" value=""/>
            <input type="text" name="tipo_comida" id="tipo_comida" required="required" placeholder="ex: entrada, prato principal, desjejum, doce, salgado..."/>
        
        </fieldset>
    </form>';
?>