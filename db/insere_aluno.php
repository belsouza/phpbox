<?php
	require_once "actions/insert.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Aula de 6/10/2020</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/inserir_style.css" rel="stylesheet">
    </head>
    <body>
		<article>
			<header>
				<h2>Inserir Aluno</h2>
			</header>
			
			<form method="POST">
				<div><label>Matricula</label><input type="text" name="matricula" placeholder="matricula"></div>
				<div><label>Nome</label><input type="text" name="nome" placeholder="nome"></div>
				<div><label>CPF</label><input type="text" name="cpf" placeholder="cpf"></div>
				<div><label>Data de Nascimento</label><input type="text" name="dtNasc" placeholder="Data de nascimento"></div>
				<input type="submit">
				<button type="button" id="voltar" >Home</button>

			</form>
			<footer>
				<p>Aula do dia 06/10</p>			
			</footer>
		</article>
    	<script type="text/javascript">			
			var voltar = document.getElementById("voltar");	
			voltar.addEventListener("click", function(){
				window.location.href = "exibir_alunos.php";
				
			});	
		</script>
    
    </body>
</html>