<?php
	
	require_once("valida.php");
		
	$nome = "";
	$idade = "";
	$email = "";
	$senha = "";
	$mostraemail = "";
	$mostraidade = "";
	$mostranome = "";
	
	if(isset($_POST["nome"]) && (isset($_POST["idade"]) && isset($_POST["email"]) && isset($_POST["senha"]))){
		
		$validar = new Valida($_POST["nome"], $_POST["idade"], $_POST["email"], $_POST["senha"] );		
		$nome = $validar->valida_nome();
		$idade = $validar->valida_idade();
		$email = $validar->valida_email();
		$senha = $validar->valida_senha();
		
		
		if(!$nome){
			echo "<span class='error'>Ops! Nome Invalido! " . $validar->getErrorName(). "</span>";
		}		
		if(!$idade){
			echo "<span class='error' >Ops! Idade Invalida! ". $validar->getErrorIdade(). "</span>";
		}
		if(!$email){
			echo "<span class='error' >Ops! Email Invalido! ".$validar->getErrorEmail(). "</span>";
		}
		if(!$senha){
			echo "<span class='error' >Ops! Senha Invalida! ".$validar->getErrorPassword(). "</span>";
		}
		if(!$nome || !$idade || !$email || !$senha){
			echo "<p class='advert'>Ha erros de validação no seu formulário. Tente novamente!</p>";
		}
		else{
			
			$mostranome = "<h1>$nome</H1>";
			$mostraidade = "<p>".$idade."</p>";
			$mostraemail = "<p>".$email."</p>";
			
		}		
	}	
	
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Response</title>
<link rel="stylesheet" type="text/css" href="css/response.style.css" >	
	
</head>

<body>	
	<header><?php echo $mostranome; ?></header>
	<article>
	<?php echo $mostraidade . $mostraemail; ?>	
	</article>
	
	<footer>
		<button id="action">Voltar</button>
	</footer>
	
	<script>
		document.getElementById("action").addEventListener("click", function(){
			window.location.href = "index.php";
		});
	
	</script>
</body>
</html>