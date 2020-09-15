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
	<form action="response.php" method="post">
	
		<div>
		<label>Nome</label>
		<input type="text" name="nome" placeholder="Nome">
		</div>
		
		<div>
		<label>Idade</label>
		<input type="text" name="idade" placeholder="Idade">
		</div>
		
		<div>
		<label>Email</label>
		<input type="email" name="email" placeholder="Email">
		</div>
		
		<div>
		<label>Senha</label>
		<input type="password" name="senha" id="senha" placeholder="Senha" >
		<input type="checkbox" onclick="mostrar()">Exibir senha
		</div>
		
		<button type="submit" >Submit</button>	
	</form>
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