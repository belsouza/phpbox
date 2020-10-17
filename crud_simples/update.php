<?php

require_once ("tabela.php");

$vmatricula = "";
$vnome = "";
$vcpf = "";
$vdatanasc = "";
$nerror = "";

$servername = "localhost";
$username = "3daw";
$password = "mysql123";
$database = "3dawtest";
$procura = "";

$matricula = "";
$nome = "";
$cpf = "";
$datanasc = "";
$nerror = "";
$message = "";

$matr_erro = "";
$nm_erro = "";
$cpf_erro = "";
$dt_erro = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST["nmatricula"])){

		$matricula = $_POST["nmatricula"];
		
		$conn = new mysqli($servername, $username, $password, $database);
		if($conn->connect_error){
			die ("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT Matricula, Nome, CPF, DataNascimento FROM alunos where Matricula = '{$matricula}'";
		if($result = $conn->query($sql)){
			$row = $result->fetch_assoc();
			
			if($row > 0){
				$vmatricula = $row["Matricula"];
				$vnome = $row["Nome"];
				$vcpf = $row["CPF"];
				$vdatanasc = $row["DataNascimento"];				
			}
			else
			{
				$message = "Nenhum registro para a matricula selecionada.";
			}
			
		}
		$conn->close();
	}
	
	
	
	if(isset($_POST["matricula"])  && (isset($_POST["nome"]) && (isset($_POST["cpf"]) && (isset($_POST["dtNasc"])))))	{
		
		$matricula = $_POST["matricula"];
		$nome = $_POST["nome"];
		$cpf = $_POST["cpf"];
		$datanasc = $_POST["dtNasc"];
		
		
		$servername = "localhost";
		$username = "3daw";
		$password = "mysql123";
		$database = "3dawtest";


		$mysqli = new mysqli($servername, $username, $password, $database);
		if($mysqli->connect_error){
			die ("Connection failed: " . $mysqli->connect_error);
		}

		$sql = "UPDATE alunos SET ";
		$sql .= "Nome = '". $nome . "', ";
		$sql .= "CPF= '". $cpf . "', ";
		$sql .= "DataNascimento = '". $datanasc . "' ";
		$sql .= "WHERE Matricula = ". $matricula;


		if($result = $mysqli->query($sql)){
			$message = "<p>Atualizacao feita com sucesso!</p>";
		}else{
			$message = "Erro: ". $mysqli->error;
		}

		$mysqli->close();	
	}	
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Aluno</title>
	<style type="text/css">
		
		html, body{
			width: 100%;
			height: 100%;	
		}
		
		body{
			display: flex;
			flex-direction: row;
		}
		
		section{
			display: flex;
			flex-direction: column;
			height: 100%;
		}
		
		.forms{
			flex-grow: 1;
			background-color: white;
			
		}		
		
		.records{
			flex-grow: 10;
			background-color: whitesmoke;
			display: flex;
			padding: 30px;
		}
		
		#form1{
			background-color: antiquewhite;
			display: inline-block;			
		}

		#form1 span{
			display: block;
		}
		
		#form1, #form2{
			padding: 10px;
		}
		
		#form2 div{
			margin-top: 10px;	
		}

		#form2 input[type=button]{
			margin-top: 10px;	
		}
		
		.records table,
		.records p{
			width: 100%;
		}		
		
		table tr td{
			border-bottom: solid 1px grey;
			padding: 10px;
		}
		
	</style>
</head>
<body>
    <section class="forms">

		<form method="post" id="form1" name="form1">
			<span>Entre com o numero da matricula: </span>
			<input type="text" name="nmatricula">
			<input type="button" name="procurar" id="procurar" value="Procurar">		
		</form>
		

        <form method="post" id="form2" name="form2">

			<div>
				Matricula: <br/><input type="text" name="matricula"  value="<?php echo $vmatricula;  ?>"><?php echo $matr_erro; ?>
			</div>
            
			<div>
				Nome:<br/> <input type="text" name="nome" value="<?php echo $vnome;  ?>" ><?php echo $nm_erro;  ?>			
			</div>
            
			<div>
				CPF: <br/><input type="text" name="cpf" value="<?php echo $vcpf;  ?>" ><?php echo $cpf_erro;  ?>			
			</div>
            
			<div>
				Data de Nascimento: <br/>
				<input type="text" name="dtNasc" value="<?php echo $vdatanasc;  ?>" ><?php echo $dt_erro;  ?>			
			</div>
            
            <input type="button" id="atualizar" name="atualizar" value="Atualizar">   
        </form>

        <section class="results">
            <?php echo $message; ?>
        </section>
    </section>
	<section class="records">
		<?php echo $tabela; ?>
	
	
	
	</section>
	<script type="text/javascript">
		
		document.getElementById("procurar").addEventListener("click", function(){
			
			document.getElementById("form1").submit();
			
		});
		
		document.getElementById("atualizar").addEventListener("click", function(){
			
			document.getElementById("form2").submit();
			
		});
	
	
	</script>
	    
</body>
</html>