<?php
include "conf.php";

cabecalho();

if(empty($_POST))
{
    echo'<form method="POST" action="form_tipo_de_comida.php">
        <fieldset>
            <legend>Tipos de Comida</legend>
            <input type="text" name="tipo_comida" id="tipo_comida" required="required" placeholder="ex: entrada, prato principal, desjejum, doce, salgado..."/>
            <input type="submit" value="cadastrar"/>
        </fieldset>
    </form>';
}
else
{
    include "insere_tipo_comida.php";
}

rodape();

?>