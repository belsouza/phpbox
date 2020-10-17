<?php

set_time_limit(300);
require_once "actions/exibir_tudo.php";

$tabela = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$procura = $_POST["search"];	
	$tabela = mostrar_parcial( $procura );	
}
else{
	$tabela = mostrar_tabela();
}



?>