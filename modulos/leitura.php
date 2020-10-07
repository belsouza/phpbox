<?php

$erro = "";
$matricula = "";
$nome = "";
$endereco = "";
$cep = "";
$cidade = "";
$estado = "";
$cpf = "";
$datadenascimento = "";

function valida_texto($texto){
	if($texto == ""){
		return false;
	}
	return true;
}

function valida_inteiro($inteiro){
	if($inteiro == ""){
		return false;
	}
	return true;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if(valida_texto($_POST["matricula"])){
		$matricula = $_POST["matricula"];
	}else{
		$erro .= "O campo nao pode estar vazio.";
	}
	
	if(valida_texto($_POST["nome"])){
		$nome = $_POST["nome"];
	}else{
		$erro .= "O campo nao pode estar vazio.";
	}
	
	if(valida_texto($_POST["endereco"])){
		$endereco = $_POST["endereco"];
	}else{
		$erro .= "O campo nao pode estar vazio.";
	}
	
	if(valida_texto($_POST["cep"])){
		$cep = $_POST["cep"];
	}else{
		$erro .= "O campo nao pode estar vazio.";
	}
	
	if(valida_texto($_POST["cidade"])){
		$cidade = $_POST["cidade"];
	}else{
		$erro .= "O campo nao pode estar vazio.";
	}
	
	if(valida_texto($_POST["estado"])){		
		$estado = $_POST["estado"];
	}else{
		$erro .= "O campo nao pode estar vazio.";
	}
	
	if(valida_texto($_POST["cpf"])){
		$cpf = $_POST["cpf"];
	}else{
		$erro .= "O campo nao pode estar vazio.";
	}
	
	if(valida_texto($_POST["datanasc"])){
		$datadenascimento = $_POST["datanasc"];	
	}else{
		$erro .= "O campo nao pode estar vazio.";
	}
	
		
	
	$arquivoSaida = fopen("Alunos Exportacao.txt", "w") or die("Cannot open");
	$linha = "matricula;nome;endereco;cep;cidade;estado;cpf;datanascimento\r\n";
	fwrite($arquivoSaida, $linha);
	$linha = "20201123456;Joao;rua das marrecas s/n;20031120;rio de janeiro;023655444412;10/05/1986\r\n";
	fwrite($arquivoSaida, $linha);
	$linha = "20201145856;Maria;rua Clarimundo de Melo 857;21033120;rio de janeiro;365669744412;20/10/1986\r\n";
	fwrite($arquivoSaida, $linha);
	$linha = $matricula.";".$nome.";".$endereco.";".$cep.";".$cidade.";".$estado.";".$cpf.";".$datadenascimento."\r\n";
	fwrite($arquivoSaida, $linha);
	fclose($arquivoSaida);
}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
	<form method="post">
		Matricula:<input type="text" name="matricula"><br/>
		Nome: <input type="text" name="nome"><br/>
		Endereço:<input type="text" name="endereco"><br/>
		Cep:<input type="text" name="cep"><br/>
		Cidade:<input type="text" name="cidade"><br/>
		Estado:<input type="text" name="estado"><br/>
		CPF:<input type="text" name="cpf"><br/>
		Data de nascimento: <input type="date" name="datanasc"><br/>
		<input type="submit" value="enviar">
		<?php echo $erro; ?>

	</form>
</body>
</html>