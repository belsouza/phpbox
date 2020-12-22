<?php include_once "actions/r_session.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Falls Car</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/cadastro_style.css" rel="stylesheet">
		<link href="css/menu.css" rel="stylesheet" >
        <script src="js/main.js" ></script>
    </head>
    <body>
        

        <article id="container">
			
			<header>
				<h1>Falls Car</h1>
				
				
				<section class='informations'>
					<?php echo $contents; ?>								
				</section>
				
			</header>
			
			<section id="contents">
			
				 <form id="cadastrar" method="post" action="cadastro_enderecos.php">

					<div>
						<label>Nome</label>
						<input type="text" id="nome" name="nome" placeholder="Nome" >                
					</div>

					<div>
						<label>CPF</label>
						<input type="text" id="cpf" name="cpf" placeholder="CPF" >                
					</div>

					<div>
						<label>Data de Nascimento</label>
						<input type="date" id="data_nascimento" name="data_nascimento" placeholder="Data de Nascimento" >                
					</div>
					 
					 <div>
						<label>Celular</label>
						<input type="tel" id="celular" name="celular" placeholder="Telefone Celular" >                
					</div>
					 
					 <div>
						<label>Senha</label>
						<input type="password" id="senha" name="senha" placeholder="senha" >                
					</div>

					<button type="submit">Continuar</button>

				</form>			
			
			</section>
			
			<footer>
			 <p>All Might</p>			
			</footer>          
        
        </article>
    </body>
</html>