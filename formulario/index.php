<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/index.style.css" >
<title>Documento sem título</title>
	
</head>

<body>
	<header>
		<h1>Formulário</h1>
	</header>
	<article>
		<form action="response.php" method="post">
			
				<div class="nform">
					<label>Nome</label>
					<input type="text" name="nome" placeholder="Nome">
				</div>
				
				<div class="nform">
					<label>Idade</label>
					<input type="text" name="idade" placeholder="Idade">
				</div>
				
				<div class="nform">
					<label>Email</label>
					<input type="email" name="email" placeholder="Email">
				</div>
				
				<div class="nform">
					<label>Senha</label>
					<input type="password" name="senha" id="senha" placeholder="Senha" >					
				</div>
			
				<div class="nform">
					<input type="checkbox" onclick="mostrar()">Exibir senha
				</div>
				<button type="submit" >Submit</button>	
			</form>
	</article>
	<footer>
		<span>Disciplina 3daw </span>
	</footer>
	
	<script type="text/javascript">
		
		var campo = document.getElementById("senha");
		campo.setAttribute("checked","");
		
		function mostrar(){			
			if(campo.type === "password"){
				campo.type = "text";
			}else{
				campo.type = "password";
			}
		}	
	</script>
</body>
</html>