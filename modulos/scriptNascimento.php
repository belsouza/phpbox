<!--
criar um script php que calcule a sua idade a partir da data do seu nascimento e mostre na tela.
O resultado deverá ser seu nome, sua data de nascimento e sua idade.
-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
	
<style>
	label { display: block; }
	input { margin-bottom: 10px; }
	.response{ background-color: aqua; padding: 10px; width: 300px; margin: 10px 0; }
	
	
</style>
</head>


<body>
	<form action="#">
		<div>
			<label>Nome</label>
			<input type="text"  name="nome" >
		</div>
		
		<div>
			<label>Data de Nascimento</label>
			<input type="date"  name="data" placeholder="dd/mm/yyyy" >
		</div>		
		
		<button type="submit">Calcular</button>
	
	</form>
	
	<?php
	
	if(isset($_GET["nome"]) && isset($_GET["data"])) 
	{
		$name = $_GET["nome"];
		$data = $_GET["data"];
		
		$calcdata = explode("-", $data);
		$currentyear = date("Y");
		
		$idade = $currentyear - $calcdata[0];
		$datanascimento = $calcdata[2]. "/" . $calcdata[1]. "/" .$calcdata[0];		
	}
	
	?>
	
	<div class="response">
	<?php
		
		echo "Nome: " . $name . "<br/>Data de Nascimento: " . $datanascimento . "<br/>Idade: " . $idade;
		
	?>	
	</div>	
	
</body>
</html>


