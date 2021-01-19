<?php

	$host = "localhost";
	$bd = "aula_2_2021";
	$usuario = "root";
	$senha = "usbw";

	$con = mysqli_connect($host,$usuario,$senha,$bd) or die("Erro ao abrir a conexão com o banco de dados.");

	mysqli_set_charset($con, "utf8");
?>