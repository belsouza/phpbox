<?php require_once "tabela.php"; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
<style>
	html, body{
		width: 100%;
		height: 100%;	
	}
		
	body{
		display: flex;
		flex-direction: column;
	}

	table,
	p{
		width: 100%;
	}		
		
	table tr td{
		border-bottom: solid 1px grey;
		padding: 10px;
	}


</style>
</head>

<body>
	<?php echo $tabela;  ?>	
</body>
</html>