<?php

require_once "actions/update.php";
require_once "actions/response_atualizar.php";

?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/atualizar_style.css" rel="stylesheet">
    </head>
    <body>
		<article>
			<form method="POST" >
				<div>
					<label>Matricula</label>
					<input type="hidden" name="matricula" value="<?php echo $vmatricula; ?>">	
					<h3><?php echo $vmatricula; ?></h3>				
				</div>
				
				<div>
					<label>Nome</label>
					<input type="text" name="nome" value="<?php echo $vnome; ?>">				
				</div>
				
				<div>
					<label>CPF</label>
					<input type="text" name="cpf" value="<?php echo $vcpf; ?>">				
				</div>
				
				<div>
					<label>Data de Nascimento</label>
					<input type="text" name="datanasc" value="<?php echo $vdatanasc; ?>">				
				</div>
				
				<button type="submit" id="atualizar" >Atualizar</button>
				
			</form>
			<button type="button" id="voltar" >Voltar</button>
			<section id="info">				
				<?php echo $msg; ?>			
			</section>
			
			<section id="erro">
				<?php echo $nerror; ?>	
			</section>
			
			
			<footer> <p>3DAW Faeterj</p> </footer>
		</article>
		<script type="text/javascript">
			var voltar = document.getElementById("voltar");			
			
			voltar.addEventListener("click", function(){
				window.location.href = "exibir_alunos.php";
				
			});		
		</script>
		    
    </body>
</html>