<?php 
require_once "search.php";


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css" >
<title>Procurar</title>
</head>
<body>
	<article id="wrapper">	
		<header>
			<form action="#" method="get">
				<input type="search" name="procurar" placeholder="Search" >
				<button type="submit">Procurar</button>	
			</form>	
		</header>

		<article id="results">		

			<section id="found"><?php echo $results; ?></section>
			<section><?php echo $table; ?></section>			
			
		</article>	
	</article>
	
</body>
</html>

	  