<?php


require_once "../model/grupos_de_Carros.php";

$lista = new Grupos_de_carros();
$dados = $lista->nomeGrupo();
echo json_encode($dados);




?>