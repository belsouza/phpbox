<?php

require_once("validacao.php");

$servername = "localhost";
$username = "3daw";
$password = "mysql123";
$dbname = "3dawTest";

$matricula = "";
$nome = "";
$cpf = "";
$dtNasc = "";

$matr_erro = "";
$nm_erro = "";
$cpf_erro = "";
$dt_erro = "";

$conn = new  mysqli($servername, $username, $password, $dbname);
if($conn -> connect_error){
    die("Connection failed") . $conn -> connect_error;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(validarmatricula($_POST["matricula"]))
	{
		$matricula = $_POST["matricula"];
	}
	else{
		$matr_erro= "O campo matricula não pode estar vazio!";
	}
	
	if(validarnome($_POST["matricula"]))
	{
		$nome = $_POST["nome"];
	}
	else{
		$nm_erro= "O campo nome não pode estar vazio!";
	}
	
	if(validarcpf($_POST["cpf"]))
	{
		$cpf = $_POST["cpf"];
	}
	else{
		$cpf_erro= "O campo cpf não pode estar vazio!";
	}
	
	if(validardata($_POST["dtNasc"]))
	{
		$dtNasc = $_POST["dtNasc"];
	}
	else{
		$dt_erro= "O campo matricula não pode estar vazio!";
	}

    $sql = "INSERT into Alunos (Matricula, Nome, CPF, DataNascimento) VALUES " ;
    $sql .= "( '{$matricula}',  '{$nome}',  '{$cpf}',  '{$dtNasc}' )";

    if($conn -> query($sql) === TRUE){
        $message = "registro inserido";
    }else{
        $message = "Erro na criacao de aluno: ". $conn->error;
	}
	
	$conn->close();	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Aluno</title>
	<style type="text/css">
	div{
		padding: 5px;
	}
	
	
	</style>
</head>
<body>
    <section>
        <form method="post">

			<div>
				Matricula:<br/> <input type="text" name="matricula"><?php echo $matr_erro; ?>
			</div>
            
			<div>
				Nome: <br/><input type="text" name="nome"><?php echo $nm_erro;  ?>			
			</div>
            
			<div>
				CPF: <br/>	<input type="text" name="cpf"><?php echo $cpf_erro;  ?>		
			</div>
            
			<div>
				Data de Nascimento: <br/><input type="text" name="dtNasc"><?php echo $dt_erro;  ?>			
			</div>
            
			<div><input type="submit" value="Inserir">   </div>
            
        </form>

        <section>
            <?php echo $message; ?>
        </section>
		
		
    </section>    
</body>
</html>