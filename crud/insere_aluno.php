<?php
	require_once "actions/inserir.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Inserir Aluno</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
        <link href="css/inserir_style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
		<article>
			<header>
				<h2>Inserir Aluno</h2>
				<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="construir_banco.php">Construir</a></li>
					<li><a href="exibir_alunos.php">Exibir</a></li>
					<li><a href="insere_aluno.php">Inserir</a></li>
					<li><a href="atualizar_aluno.php">Atualizar</a></li>
					<li><a href="excluir_aluno.php">Excluir</a></li>
				
				</ul>
				</nav>	
			</header>
			
			<section id="content">			
				<form method="POST">
					<h1>Cadastro de Alunos</h1>
					<div><label>Matricula</label><input type="text" name="matricula" placeholder="Matricula auto" disabled></div>
					<div><label>Nome</label><input type="text" name="nome" placeholder="nome"><p class="errormsg"><?php echo $erronome; ?></p></div>
					<div><label>CPF</label><input type="text" name="cpf" placeholder="cpf"><p class="errormsg"><?php echo $errocpf; ?></p></div>
					<div><label>Data de Nascimento</label><input type="text" name="dtNasc" placeholder="Data de nascimento"><p class="errormsg"><?php echo $errodata; ?></p></div>
					<input type="submit">
				
					<div class="message">
						<?php echo $message; ?>
					</div>
					
					
				</form>
				
			
			</section>
			
			<footer>
				<p>3DAW - Faeterj | 2020 </p>			
			</footer>
		</article>
    	
    
    </body>
</html>