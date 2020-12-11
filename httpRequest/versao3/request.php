<?php

require_once "população/cidades.php";

if(isset($_REQUEST["uf"]))
{
	$uf = $_REQUEST["uf"];
	$data = new Cidades();
	$lista = $data->mostrarSelect( $uf );
	echo implode("\r\n", $lista);
}



?>