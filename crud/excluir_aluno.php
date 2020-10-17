<?php

require_once "actions/excluir.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Excluir Aluno</title>
        <meta charset="UTF-8">
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/excluir_style.css" rel="stylesheet">
    </head>
    <body>		
		<article>			
			<header>
			<h1>Excluir Aluno</h1>
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

				<section>
					<form method="POST" >
					<h1>Excluir Aluno</h1>
						<div>
							<label>Matricula</label>							
							<input type="text" name="matricula" value="<?php echo $vmatricula; ?>">	
							<?php echo $matricula_val;  ?>							
							<p class="errormsg"><?php echo $erromatricula;   ?></p>		
						</div>

						<div>
							<label>Nome</label>
							<input type="text" name="nome" value="<?php echo $vnome; ?>">
							<p class="errormsg"><?php echo $erronome; ?>	</p>			
						</div>

						<div>
							<label>CPF</label>
							<input type="text" name="cpf" value="<?php echo $vcpf; ?>">	
							<p class="errormsg"><?php echo $errocpf; ?>	</p>		
						</div>

						<div>
							<label>Data de Nascimento</label>
							<input type="text" name="datanasc" value="<?php echo $vdatanasc; ?>">
							<p class="errormsg"><?php echo $errodata; ?>	</p>			
						</div>

						<button type="submit" id="excluir" >Excluir</button>
						
					</form>

					

					<section id="info">				
						<?php echo $message; ?>			
					</section>

				</section>
			
			</section>
			
			
			<footer> <p>3DAW - Faeterj | 2020 </p> </footer>
		</article>
			
    </body>
</html>