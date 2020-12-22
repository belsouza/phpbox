<?php

session_start();

$id = "";
$nome = "";
$contents = "<div>";

if(isset($_SESSION["ID"])){
    $id = $_SESSION["ID"];
	$contents .= "<input type='hidden' name='id' value='{$id}' />";
}


if(isset($_SESSION["Nome"])){
     $nome = $_SESSION["Nome"];
	 $contents .= "<a href=\"editar_cadastro.php?id={$id}\">{$nome}</a>   <a href=\"actions/r_logout.php\">Logout</a>  | ";
}

$contents .= "</div>";

$contents .= file_get_contents("comum/menu.php");


?>