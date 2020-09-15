<?php

session_start();
error_reporting(E_ALL);
include "funcoes.php";

$n = $s = "";
$message = "";
$status = false;
$voltar = false;

if(isset($_POST["nome"]) and isset($_POST["senha"])){
	$n = valida_nome($_POST["nome"]);
	$s = valida_senha($_POST["senha"]);	
}

if($n and $s){
	
	$_SESSION["nome"] = $n;
	
	if(valida_sessao($_SESSION["nome"]) !== false){
		$message = valida_sessao($_SESSION["nome"]);
		$status = true;
		
	}else{
		$message = "Logue, por favor";
		$voltar = true;
	}	
	
}else{
	$message = "Não permitido";
	$voltar = true;
}
?>
<!DOCTYPE html>
<html>
    <head>        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/response.style.css" rel="stylesheet">
		<title>Resposta</title>
    </head>
    <body>	
		<article>
			<header>
			<?php 
				echo "<p>". $message."</p>"; 
				if($status){				
			?>			
				
			<form method="post"><button type="submit" name="logoff">Sair</button></form>	
			
			<?php } 
				
				if(isset($_POST["logoff"])){
					logoff();
				}				
			?>
				
				
			<?php 
				 
				if($voltar){				
			?>			
				
			<form method="post"><button type="submit" name="voltar">Voltar</button></form>
			
			<?php } 
				
				if(isset($_POST["voltar"])){
					voltar();
				}				
			?>
					
			</header>	
		</article>	
	</body>
</html>
		
		
		