<?php 

require_once "tabela.php";

$tabela = $pagination = $page = $data = "";

isset($_POST["procurar"]) ?  $data = $_POST["procurar"] : $data = "";

isset($_GET["page"] ) ? $page =$_GET["page"] : $page = "";

$transaction = new Tabela(10, "", $data  );	
$tabela = $transaction->exibir_tabela();

//Falta terminar a implementação
//$pagination = $transaction->exibir_paginacao( $page );


?>