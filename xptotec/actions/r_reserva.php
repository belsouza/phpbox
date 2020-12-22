<?php

require_once "../comum/config.php";

$cliente = "";
$carro = "";
$agencia = "";
$data_retirada = "";
$hora_retirada = "";
$data_devolucao = "";
$hora_devolucao = "";

if(isset($_POST["cliente"])){
	$cliente = "cliente";	
}

if(isset($_POST["carro"])){
  $carro = $_POST["carro"];
}

if(isset($_POST["agencia"])){
	$agencia = $_POST["agencia"];
}

if(isset($_POST["data_retirada"])){
	$data_retirada = $_POST["data_retirada"];
}

if(isset($_POST["hora_retirada"])){
	$hora_retirada = $_POST["hora_retirada"];
}

if(isset($_POST["data_devolucao"])){
	$data_devolucao = $_POST["data_devolucao"];
}

if(isset($_POST["hora_devolucao"])){
	$hora_devolucao = $_POST["hora_devolucao"];
}


$conn = new mysqli($host,$user,$password,$database);

if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}

$sql = "INSERT INTO `reservas` (`ReservaID`, `Cliente`, `Carro`, `Agencia`, `Data_retirada`, `Hora_retirada`, `Data_devolucao`, `Hora_devolucao`) VALUES (NULL, \"{$cliente}\", \"{$carro}\", \"{$agencia}\", \"{$data_retirada}\", \"{$hora_retirada}\", \"{$data_devolucao}\", \"{$hora_devolucao}\")";

$sql .= "UPDATE `catalogo` SET `Estado`=\"Alugado\" WHERE `CarroID`=\"{$carro}\" AND `AgenciaID`=\"{$agencia}\"";


if ($conn -> multi_query($sql)) {
	
	
  do {  
	  
    if ($result = $conn -> store_result()) {
      while ($row = $result -> fetch_row()) {
        printf("%s\n", $row[0]);
      }
     $result -> free_result();
    }
 
    if ($conn -> more_results()) {
      printf("-------------\n");
    }
     //Prepare next result set
  } while ($conn -> next_result());
}

echo "Registro feito com sucesso!";

$conn -> close();


?>