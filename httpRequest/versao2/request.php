<?php

$uf = $_REQUEST["uf"];

$dados = file_get_contents("estados/{$uf}.php");
echo  utf8_encode( $dados );

?>