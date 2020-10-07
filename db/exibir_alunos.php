<?php
require_once "actions/select.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Exibir Alunos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/exibir_style.css" rel="stylesheet">
    </head>
    <body>
		<article>
			<header>
				<form method="post">
					<div>
						
						<input type="search" name="search">
						<button type="submit">Procurar</button>
						<button type="button" id="inserir">Inserir Registro</button>
					</div>
				</form>
			</header>
			<section id="resultados">			
				<?php
				
				if($tabela == ""){
					echo "<p>A tabela está vazia </p>";
				}
				else{
					echo $tabela; 
				}		
				
				
				?>			
			</section>
			
			<footer>Disciplina 3DAW - Faeterj </footer>
		</article> 
		<script type="text/javascript">
			document.getElementById("inserir").addEventListener("click", function(){
				window.location.href = "insere_aluno.php";
			});
		
		</script>
    </body>
</html>