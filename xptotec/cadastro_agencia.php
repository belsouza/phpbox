<?php include_once "actions/r_session.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Falls Car</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/cadastro_agencia_style.css" rel="stylesheet">
		<link href="css/menu.css" rel="stylesheet" >
        <script src="js/agencias.js" defer></script>	
    </head>
    <body>
        

        <article id="container">
			
			<header>
				<h1>Falls Car</h1>
				
				
				<section class='informations'>
					<?php echo $contents; ?>
					<nav>
						<ul>						
							<li><a href="index.php"> Home </a></li>
							<li><a href="login.php"> Login </a></li>
							<li><a href="escolha_carro.php"> Escolha do Carro </a></li>
							<li class="has_sub"><a href="cadastro.php"> Cadastros </a>
								<ul>
									<li><a href="cadastro_cliente.php"> Cadastro de Clientes </a></li>
									<li><a href="cadastro_agencia.php"> Cadastro de Agência </a></li>
									<li><a href="cadastro_reserva.php"> Cadastro de Reservas </a></li>
									<li><a href="cadastro_reserva.php"> Cadastro de Carros </a></li>						
								</ul>
							</li>
						</ul>			
					</nav>				
				</section>
				
			</header>
			
			<section id="contents">
			
				 <form id="cadastrar_ag" method="post">
					 
					 <div>
						<label>Nome Fantasia</label>
						<input type="text" name="nome" id="nome" placeholder="Nome da Agencia"  />
					</div>

					<div>
						<label>Cidade</label>
						<select id="cidade" name="cidade" placeholder="Escolha Cidade, Aeroporto ou Loja" >
							<option value="">Escolha um</option>
						</select>
					</div>					

					<button type="button" id="cadastrar">Cadastrar</button>

				</form>			
			
			</section>
			
			<footer>
			 <p>All Might</p>
			
			</footer>          
        
        </article>
    </body>
</html>