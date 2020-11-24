<?php include_once "controller/ctrl_index.php"; ?>
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
                    <nav>
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
                    <nav aria-label="outros" id="outros">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="cenarioum.php">Cenario1</a></li>
                            <li><a href="cenariodois.php">Cenario2</a></li>                         
                        </ul>                     
                    </nav>                 
                
                </section>
                
                <section>
                <h1>Administracao</h1>

                    <form method="post" name="popular" >

                        <input type="hidden" name="populando" value="" />
                        <button type="submit">Criar e Popular tabelas</button>         
                        
                    </form>
                
                </section>
                
		        

            </section>        
            <footer>
                <p>3daw - 2020</p>
            </footer>        
        
        </article>    
    </body>
</html>