<?php 

include "script.php"; 

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Datas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
		<article>
			<header>  
				<?php
				echo "<span>". $f1. "</span>";
				echo "<span>". $f2. "</span>";
				echo "<span>". $f3. "</span>";				
				?>			
			</header>
			
			<?php 
			
			if(isset($_SESSION["nome"])){
				$status = true;
			}
			
			if(!$status){			
			?>
			
					
			<section>
				<form method="post" id="form1">
					<div>
						<label>Nome</label>
						<input type="text" name="nome">					
					</div>
					<div>
						<label>Senha</label>
						<input type="text" name="senha">					
					</div>
					<button type="submit" id="login">Login</button>				
				</form>			
			
			</section>
			
			<?php } ?>
	
			<?php if($status){ ?>
			
			<section>
				
				<div id="msg">
					<span>Olá <?php echo $_SESSION["nome"];  } ?></span>
					<form method="post"><input type="submit" name="sair" value="Sair" id="sair"  ></form>
				</div>
			</section>
			
			<?php 
			
			if(isset($_POST["sair"])){
				session_destroy();
				unset($_POST["nome"]);
				header("Location: index.php");				
			}
			
			
			?>
			
			<footer>
			
			
			</footer>
		
		
		</article>
    
    </body>
</html>