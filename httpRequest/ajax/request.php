<?php

$uf = $_REQUEST["uf"];

$dados = file_get_contents("estados/{$uf}.txt");
echo  utf8_encode( $dados );

?>