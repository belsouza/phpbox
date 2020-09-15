<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/session.style.css" rel="stylesheet">
<title>Documento sem título</title>		
</head>

<body>
	<article>
		<header>
			<?php 
				if(isset($_SESSION["nome"])){
					echo "<p> Usuário ". $_SESSION["nome"] . " está logado.</p>";
				}	
			?>	
		</header>
		<section>
			<form method="post" action="response.php">
				<div>
					<label>Nome</label>
					<input type="text" name="nome">					
				</div>
				<div>
					<label>Senha</label>
					<input type="text" name="senha">					
				</div>
				<button type="submit">Login</button>				
			</form>	
		</section>
	</article>
</body>
</html>