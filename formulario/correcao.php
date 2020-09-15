<?php

/*
OBSERVAÇÃO: ÀS VEZES, A ORDEM IMPORTA. NÃO FUNCIONOU
QUANDO A CHAMADA DA FUNÇÃO FOI FEITA ANTES DA DECLARAÇÃO.
PARA FUNCIONAR, TIVE QUE INVERTER, E DECLARAR PRIMEIRO E 
DEPOIS CHAMAR A FUNÇÃO.
*/

$erro = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	
	$nome = "";
	$idade = "";

	if (isset($_POST["nome"])){	
		
		$nome = $_POST["nome"];
	}

	if(isset($_POST["nome"])){
		$idade = $_POST["idade"];
	}	

	function valida_nome($texto){
		if($texto != ""){
			return true;
		}
		return false;
	}

	function valida_inteiro($inteiro){
		if($inteiro != ""){
			return true;
		}
		return false;
	}
	
	if(!valida_nome($idade)){
		$erro = "Nome com valor invalido. ";
	}

	if(!valida_inteiro($idade)){
		$erro = "Idade com valor invalido. ";
	}
	
	if(empty($idade)){
		$erro = $erro. "Idade é obrigatório. ";
	}
	
	if(empty($nome)){
		$erro = $erro. "Nome é obrigatório. ";
	}
	
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Correção</title>
<style>
	input[type=text]{  margin:  5px; }
	input[type=submit] { padding: 5px 20px; margin-top: 10px; }	
</style>
</head>

<body>
	<form action="#" method="post">
		Nome: <input type="text" name="nome"><br/>
		Idade: <input type="text" name="idade"><br/>
		<input type="submit">	
	</form>
	<section>
	<?php 
		if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		if($erro == "") { ?>
		<h1>Olá <?php echo $nome; ?></h1>
		<h3>Sua idade é <?php echo $idade; ?></h3>
	<?php } else { ?>
		<p>Formulario com erro. <?php echo $erro; ?></p>
	<?php 
		 } 
	}		
	?>	
		
	</section>
</body>
	
	
	
	
	
	
	
	
	
	
	
</html>