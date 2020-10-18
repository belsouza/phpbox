<?php
	require_once "actions/select.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Exibir Alunos</title>
        <meta charset="UTF-8">
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/exibir_style.css" rel="stylesheet">
    </head>
    <body>
		<article id="container">
			<header>
				<h1>Exibir Alunos</h1>
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
			
			<article id="content">
				<section class="busca">
					<form  method="POST">
						<div>
							<input type="search" name="procurar">
							<button type="submit">Procurar</button>							
						</div>
					</form>
				</section>

				<section id="resultados">			
					<?php echo $tabela; echo $pagination; ?>			
				</section>		
			</article>
			
			<footer> <p>3DAW - Faeterj | 2020 </p></footer>
		</article> 		
    </body>
</html>