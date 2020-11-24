<?php include_once "controller/ctrl_cenariodois.php";  ?>
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
                    
                    <article>

                        <form method="post" id="formularioum">
                        
                            <fieldset class="fconsulta">

                                <div>
                                    <label for="alunos">Alunos</label>
                                    <select name="alunos" form="formularioum">
                                        <?php  echo $option3; ?>                      
                                    </select>
                                </div>

                                <button type="submit">Pesquisar</button>
                                                
                            </fieldset> 
                        </form>                        
                    </article>                   
                    

                    <form id="formulariodois" method="post" action = "response/rescenarioum.php">

                        <div class="form_control">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome" value="<?php echo $nomealuno; ?>" />                       

                        
                        <label for="nome">Período</label>
                        <input type="text" name="periodo" id="periodo" placeholder="Período" value="<?php echo $periodoaluno; ?>" />
                        </div>

                        <fieldset class="fconsulta">
                            <legend>Matricula</legend>

                            <div>
                                <label for="turma">Turma</label>
                                <select name="turma">
                                    <?php  echo $option2; ?>                      
                                </select>
                            </div>

                            <div>
                                <label for="disciplina">Disciplina</label>
                                <select name="disciplina" id="disciplina">
                                <?php  echo $option1; ?>                      
                                </select>
                            </div>

                           
                            
                        </fieldset>

                        
                        
                        
                    
                        <button type="submit">Matricular</button>
                    
                    </form>
                
                
                
                
                </section>

            </section>        
            <footer>
                <p>3daw - 2020</p>
            </footer>        
        
        </article>    
    </body>
</html>