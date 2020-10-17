<?php

$vmatricula = "";
$vnome = "";
$vcpf = "";
$vdatanasc = "";
$nerror = "";
$matricula = "";
$nome = "";
$cpf = "";
$datanasc = "";
$nerror = "";
$message = "";
$matr_erro = "";

$servername = "localhost";
$username = "3daw";
$password = "mysql123";
$database = "3dawtest";
$tabela = "";
$procura = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	
	if(isset($_POST["consulta"])){


		if($_POST["consulta"] != "")
		{
			$matricula = $_POST["consulta"];

			$conn = new mysqli($servername, $username, $password, $database);
			if($conn->connect_error){
				die ("Connection failed: " . $conn->connect_error);
			}
			$sql = "SELECT Matricula, Nome, CPF, DataNascimento FROM alunos where Matricula = '{$matricula}'";
			if($result = $conn->query($sql)){
				
				$num = $conn->affected_rows;
							
				if($num > 0)
				{
					$row = $result->fetch_assoc();
					$vmatricula = $row["Matricula"];
					$vnome = $row["Nome"];
					$vcpf = $row["CPF"];
					$vdatanasc = $row["DataNascimento"];
					$message = "" . $num . " Registro encontrado" . "<br>";
					$message .= "Matricula: ". $vmatricula ."<br>Nome: ". $vnome ."<br>CPF: ". $vcpf ."<br>Data de Nascimento: ". $vdatanasc;	
				}
				else
				{
					$message = "Nenhuma matricula encontrada";
				}					
			}
			$conn->close();
			
		}
		else
		{
			$message = "Erro no processamento. Campo matricula vazio";
		}
		
	}


	if(isset($_POST["matricula"])){
		
		$matricula = $_POST["matricula"];
		$servername = "localhost";
		$username = "3daw";
		$password = "mysql123";
		$database = "3dawtest";

		$conn = new mysqli($servername, $username, $password, $database);
		if($conn->connect_error){
			die ("Connection failed: " . $conn->connect_error);
		}		
		
		$sql = "DELETE FROM alunos WHERE Matricula = " . $matricula;

		if($result = $conn->query($sql)){
			
			$num = $conn->affected_rows;			
			$message .= "<p>Exclusão feita com sucesso!</p>";
			$message .= "<p>{$num} registro excluido.</p>";
			
			
		}else{
			$message .= "Erro: ". $conn->error;
		}
		$conn->close();	
		
	}		
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aluno</title>
    <style>
	#form2{
		display:inline-block;
		padding: 10px;
		margin-top: 10px;		
		background-color: green;
	}
	
	div{
		display:block;
		padding: 10px 0;
	}
	</style>
</head>
<body>
    <section>
        <form id="form1" method="post" name="form1">
			<div>
				Entre com o numero da matricula: <br/> 
                <input type="text" name="matricula" id="matricula" value="<?php echo $vmatricula;  ?>" ><?php echo $matr_erro; ?>
				<input type="button" id="limpar" value="Limpar">             
			</div>  
        </form>
        
        <form id="form2" method="post" name="form2">         
			<span>Conultar numero da matricula: </span>       
			<input type="hidden" name="consulta" id="consulta">
			<input type="button" id="verificar" value="Consultar">   
        </form>
        
        <div>
        <input type="button" id="excluir" value="Excluir">   
        </div>
		
        <section>
            <?php echo $message; ?>
        </section>
    </section> 
    <script type="text/javascript">

	document.getElementById("limpar").addEventListener("click", function(){
		document.getElementById("matricula").value = "";
	});
	
	

	document.getElementById("verificar").addEventListener("click", function(){

		var matricula = document.getElementById("matricula").value;
		var hidden = document.getElementById("consulta");	
		hidden.value = matricula;
		document.getElementById("form2").submit();

	});
	
	document.getElementById("excluir").addEventListener("click", function(){
		
		var opt = confirm("Tem certeza que deseja excluir este registro? ");
		if(opt){
			document.getElementById("form1").submit();
		}
		
	});
	
	
	
	</script>   
</body>
</html>