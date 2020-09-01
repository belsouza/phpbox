<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
	
	<style>
		.nome{ background-color: greenyellow;  padding: 10px;}
		.idade{ background-color: deeppink;  padding: 10px;}
		.res{ width:  100px;}	
	</style>
</head>

<body>
	
	<?php
	
	require_once("valida.php");
		
	$nome = "";
	$idade = "";
	$data = array();
	
	if(isset($_POST["nome"]) && (isset($_POST["idade"]))){
		
		$nome = valida_nome($_POST["nome"]);
		$idade = valida_inteiro($_POST["idade"]);
		
		
		if(!$nome){
			echo "<p>Ops! Nome Invalido!</p>";
		}		
		if(!$idade){
			echo "<p>Ops! Idade Invalida!</p>";
		}
		if(!$nome || !$idade){
			echo "<p>Ha erros de validacao no seu formulario. Tente novamente!</p>";
		}
		else{
			echo $nome . $idade;
		}
		
	}
	
	
	?>
	
	
	<button id="action">Voltar</button>
	<script>
		document.getElementById("action").addEventListener("click", function(){
			window.location.href = "formulario.php";
		});
	
	</script>
</body>
</html>