<?php include_once "actions/r_session.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Falls Car</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/login_style.css" rel="stylesheet">
		<link href="css/menu.css" rel="stylesheet" >
		<script src="js/login.js" async language="javascript" runat="server"></script>
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
			
				 <form id="logar" method="post" action="actions/r_login.php" >

					<div>
						<label>Login</label>
						<input type="text" id="cpf" name="cpf" placeholder="CPF" >                
					</div>

					<div>
						<label>Senha</label>
						<input type="password" id="senha" name="senha" placeholder="Senha" >                
					</div>

					<button id="loginbtn" type="button">Entrar</button>

				</form>			
			
			</section>
			
			<footer>
			 <p>All Might</p>
			
			</footer>          
        
        </article>
    </body>
</html>