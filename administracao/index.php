<?php // include_once "controller/ctrl_index.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <article id="container">

            <header>
                    <section>
                        <h1>Administracao</h1>
                    </section>
                    <nav class="nmain">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="alunos.php">Alunos</a></li>
                            <li><a href="turmas.php">Turmas</a></li>
                            <li><a href="disciplinas.php">Disciplinas</a></li>
                            <li><a href="professores.php">Professores</a></li>
                            <li><a href="matriculas.php">Matriculas</a></li>
                        </ul>
                    </nav>
            </header>

            <section id="content">

                <section class="lateralbar">
                    <nav>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="cenarioum.php">Cenario1</a></li>
                            <li><a href="cenariodois.php">Cenario2</a></li>                         
                        </ul>                     
                    </nav>                 
                
                </section>
                
                <section>
                <h1>Administracao</h1>
					
					<form>
						<form action="/action_page.php">
							  <p>Please select your gender:</p>
							  <input type="radio" id="male" name="gender" value="male">
							  <label for="male">Male</label><br>
							  <input type="radio" id="female" name="gender" value="female">
							  <label for="female">Female</label><br>
							  <input type="radio" id="other" name="gender" value="other">
							  <label for="other">Other</label>							
					</form>	
					
					<button type="button">Escolher</button>	
                
                </section>        

            </section>        
            <footer>
                <p>3daw - 2020</p>
            </footer>         
        </article>
        <script type="text/javascript">
            var radio1 = document.getElementById("rad1");
            var radio2 = document.getElementById("rad2");

            if(radio1.checked == true){
				document.getElementById("form2").css("display", "block");
			}
			
			if(radio2.checked == true){
				document.getElementById("form2").css("display", "none");
			}

           // <i class="fas fa-arrow-alt-to-right    "></i>
        </script>    
    </body>
</html>