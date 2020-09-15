<?php

require_once "search.class.php";

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
error_reporting(E_ALL);

$foo = "";
$data = "";
$url = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
 
		
if(isset($_GET["procurar"])){
	$data = $_GET["procurar"];	
}

		


$response = new Search($data);	
$foo = $response->getCont();
$foo .= $response->showTable();

?>

