<?php



require_once "../comum/config.php";
error_reporting(E_ALL);

$userid = "";
$carid = "";
$agenciaid = "";
$dataretirada = "";
$horaretirada = "";
$datadevolucao = "";
$horadevolucao = "";


if(isset($_POST["userid"])){
   $userid = $_POST["userid"];
}

if(isset($_POST["carid"])){
	$carid = $_POST["carid"];
}

if(isset($_POST["agenciaid"])){
	$agenciaid = $_POST["agenciaid"];
}

if(isset($_POST["dataretirada"])){
	$dataretirada = $_POST["dataretirada"];
}

if(isset($_POST["horaretirada"])){
	$horaretirada = $_POST["horaretirada"];
}

if(isset($_POST["datadevolucao"])){
	$datadevolucao = $_POST["datadevolucao"];
}

if(isset($_POST["horadevolucao"])){
	$horadevolucao = $_POST["horadevolucao"];
}

/*
$reg = new Reserva();
$data = $reg->inserirRegistro($userid, $carid, $agenciaid, $dataretirada, $horaretirada, $datadevolucao, $horadevolucao);
if($data){
	echo $data. "Inserção feita com sucesso!";
}
*/

	try{
			
		$conn = new MySQLi( $host, $user, $password, $database);
		if(!$conn){
			throw new Exception("Erro: ". $conn->connect_error);
		}

		$sql = "INSERT INTO `reservas` (`ReservaID`, `Cliente`, `Carro`, `Agencia`, `Data_retirada`, `Hora_retirada`, `Data_devolucao`, `Hora_devolucao`) VALUES (NULL, \"{$userid}\", \"{$carid}\", \"{$agenciaid}\", \"{$dataretirada}\", \"{$horaretirada}\", \"{$datadevolucao}\",  \"{$horadevolucao}\"); ";
		
		$sql .= "UPDATE catalogo SET Estado=\"Alugado\" WHERE CarroID={$carid} AND AgenciaID={$agenciaid} ;";
		
	
		
		if ($conn->multi_query($sql)) {
			do {				
				if ($result = $conn->store_result()) {
					while ($row = $conn->fetch_row()) {
						echo $row[0];
					}
					$result->free();
				}
				
				if ($conn->more_results()) {
					echo ".....";
				}
			} while ($conn->next_result());
		}		
	}
	catch(Exception $e){
		echo("Erro: " . $e->getMessage());
	}

	printf("Registro feito com sucesso!");



?>