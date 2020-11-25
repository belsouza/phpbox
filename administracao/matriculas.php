<?php
    include_once "controller/ctrl_matriculas.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Matriculas</title>
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

                <section class="formulario">

                    <h1>Matricula de Alunos</h1>
                    
                        <?php echo $confirma;  ?> 

                        <form method="post" name="formulario1">

                            <select name="disciplinas">                                                            
                                <?php echo $doptions; ?> 
                            </select>

                            <select name="turmas">                                                            
                                <?php echo $toptions; ?> 
                            </select>

                            <button type="submit"><?php echo $confirma; ?></button>
                        
                        
                        </form>

                        <?php echo $mensagem; ?>

                </section>

                <section class="consulta">

                    <section class="searchform">
                        <form method="get" name="formulario2" >
                            <input type="search" name="procurando" placeholder="Procurar">
                            <button type="submit">Procurar</button>
                            <button id="clear" type="button">Limpar</button>
                        </form>

                    </section>

                    <?php echo $consulta; ?>
                    
                </section>             


            </section>        
            <footer>
                <p>3daw - 2020</p>
            </footer>        
        </article> 

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/fancyTable.js"></script>
        <script type="text/javascript">

            document.getElementById("clear").addEventListener('click', function(){
                window.location.href = "alunos.php";
            });   
            
            $(document).ready(function(){

                $("#tabela").fancyTable({
                    pagination: true,
                    searchable: false,
					perPage:10
				});

            });
            
        </script>    
    </body>
</html>