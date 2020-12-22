<?php

require_once "comum/config.php";

$i = 0;

function gera_item( $dados , $i){
	
	$conteudo = "";
	$conteudo .= "<section class='item'>";						 
	$conteudo .= "<div>";
	$conteudo .= "<figure>";
	$conteudo .= "<img alt=\"image\" src=\"img/". $dados[$i]["foto"]. "\" />";
	$conteudo .= "<figcaption>";
	$conteudo .= "<h2>". $dados[$i]["modelo"] ."</h2>";
	$conteudo .= "<h3>". $dados[$i]["ano"] ."</h3>";
	$conteudo .= "<h5>".$dados[$i]["versao"] ."</h5>";
	$conteudo .= "<h5>".$dados[$i]["descricao"] ."</h5>";
	$conteudo .= "</figcaption>";
	$conteudo .= "<span class=\"motor\"> Motor ". $dados[$i]["grupo"]."</span>";
	$conteudo .= "</figure>";
	$conteudo .= "</div>";
	$conteudo .= "<div>";		 
	$conteudo .= "<div class=\"preco\">";			
	$conteudo .= "<span>  R$". number_format(($dados[$i]["valor"] / 12), 2)."</span>";
	$conteudo .= "</div>";
	$conteudo .= "<button id=\"selecionar{$i}\" onclick=\"martha(this.dataset.source, this.dataset.value)\" type=\"button\" data-source=\"". $dados[$i]["id"]. "\"  data-value=\"". $dados[$i]["valor"] . "\"   >Selecionar";	
	$conteudo .= "</button>";
	$conteudo .= "</div>";
	$conteudo .= "</section>";
	
	return $conteudo;
	
}

$container = $userid = $carid = $agenciaid = $dataretirada = $horaretirada = $datadevolucao = $horadevolucao = $valor = "";

if(isset($_SESSION["ID"])){
	$userid = $_SESSION["ID"];
}

if(isset($_POST["cidade"])){
	$agenciaid = $_POST["cidade"];
}

if(isset($_POST["retirada"])){
	$dataretirada = $_POST["retirada"];
}

if(isset($_POST["hora_retirada"])){
	$horaretirada = $_POST["hora_retirada"];
}

if(isset($_POST["devolucao"])){
	$datadevolucao = $_POST["devolucao"];
}

if(isset($_POST["devolucao"])){
	$datadevolucao = $_POST["devolucao"];
}

if(isset($_POST["hora_devolucao"])){
	$horadevolucao = $_POST["hora_devolucao"];
}

if(isset($_POST["hora_devolucao"])){
	$horadevolucao = $_POST["hora_devolucao"];
}

if(isset($_POST["dias"])){
	$dias = $_POST["dias"];
}

$cv_conn = new mysqli( $host, $user, $password, $database);
if(!$cv_conn){
	echo "Erro na conexão";
}

$sql = "SELECT catalogo.CarroID, carros.Marca, carros.Modelo, carros.ano, carros.Grupo, grupos_de_carros.Descricao, carros.Versao, carros.Foto, carros.Valor, agencias.Loja, agencias.Cidade, catalogo.Estado FROM catalogo, carros, agencias, grupos_de_carros WHERE (catalogo.CarroID = carros.ID) AND (catalogo.AgenciaID = agencias.ID) AND (carros.Grupo = grupos_de_carros.Grupo) AND (catalogo.AgenciaID = {$agenciaid}) AND (catalogo.Estado = \"Livre\")";


$dados = array();

if($result = $cv_conn->query($sql)){
	
	$i = 0;
	while($row = $result->fetch_row()){
		$dados[$i]["id"] = $row[0];
		$dados[$i]["marca"] = $row[1];
		$dados[$i]["modelo"] = $row[2];
		$dados[$i]["ano"] = $row[3];
		$dados[$i]["grupo"] = $row[4];
		$dados[$i]["descricao"] = $row[5];
		$dados[$i]["versao"] = $row[6];
		$dados[$i]["foto"] = $row[7];
		$dados[$i]["valor"] = $row[8];
		$dados[$i]["loja"] = $row[9];
		$dados[$i]["cidade"] = $row[10];
		$dados[$i]["estado"] = $row[11];
		$i++;
	}
}

$cv_conn->close();

if($i == 0){
	$container = "Não tem nenhum veiculo disponivel para esta cidade!";
}


 for($i = 0; $i < count($dados); $i++){					 
	$container .= gera_item($dados, $i);
 }



?>