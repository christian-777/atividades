<?php
    echo'<form method="POST">
            <fieldset>
                <legend>Comidas</legend>
                id da comida<input type="text" name="idcomida" id="idcomida" readonly="readonly" />
                <br />
                <input type="text" name="comida" id="comida" required="required" placeholder="ex: entrada, prato principal, desjejum, doce, salgado..."/>
                <br />
                <input type="text" name="preco" id="preco" required="required" placeholder="Preço"/>
                <br />
                <select id="select2" name="select2" required="required">
                    <option label="Tipo de Comida" />
                </select>
            </fieldset>
        </form>';
?>