<?php include_once "controller/ctrl_cenariodois.php";  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/cenarios.css" rel="stylesheet"> 
        <script type="text/javascript">

            function escolher( argumento ){
                document.getElementById("turma").value = argumento;
            }

        </script>       
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
                    <nav aria-label="outros" >
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="cenarioum.php">Cenario1</a></li>
                            <li><a href="cenariodois.php">Cenario2</a></li>                         
                        </ul>                     
                    </nav>               
                </section>
                
		        <section>
                    
                    <article class="fcontainer">

                        <form method="post" id="formularioum">
                        
                            <fieldset class="fconsulta">

                                <div>
                                    <label for="alunos">Alunos</label>
                                    <select name="alunos" id="matricula_alunos" form="formularioum">
                                        <?php  echo $option3; ?>                      
                                    </select>                                   
                                </div>

                                <button id="consultar" type="submit">Pesquisar</button>
                                                
                            </fieldset>              

                        </form>                        
                    </article> 
                    
                    <article class="fcontainer">
                        <section class="form_control">

                                <div>
                                    <label for="nome">Nome</label>
                                    <input type="text" name="nome" id="nome" placeholder="Nome" value="<?php echo $nomealuno; ?>" />               
                                </div>
                                
                                <div>
                                    <label for="nome">Período</label>
                                    <input type="text" name="periodo" id="periodo" placeholder="Período" value="<?php echo $periodoaluno; ?>" />
                                </div> 

                        </section>
                        <section class="form_control">
                                <div>
                                <label for="disciplina">Disciplina</label>                                
                                    <select name="disciplina" id="disciplina">
                                    <?php  echo $option1; ?>                      
                                    </select>
                                </div>

                                <form name="check" id="check" method="post">
                                    <input type="hidden" name="oscar" id = "oscar">
                                </form>
                                
                        </section>

                        <section class="form_control">
                            <div>
                                <label>Turmas Disponiveis</label>

                                <form id="turmas">
                                        <?php echo $content; ?>
                                </form>             
                                
                                
                            </div>                           

                        </section>

                        <form id="formulariodois" method="post" action = "response/rescenariodois.php">

                            <input type="hidden" name="matricula" id = "matricula" value="<?php  echo $_SESSION["matricula"];   ?>" >
                            <input type="hidden" name="disciplina" id = "disciplina" value="<?php  echo $_SESSION["disciplina"];   ?>" >
                            <input type="hidden" name="periodo" id = "periodo" value="<?php  echo $_SESSION["periodo"];   ?>" >
                            <input type="hidden" name="turma" id = "turma"  >

                            <button type="submit">Matricular</button>   
                        </form>

                    </article>
                        
                </section>

            </section>        
            <footer>
                <p>3daw - 2020</p>
            </footer>        
        
        </article>
        <script type="text/javascript">
        
         
        
            document.getElementById("disciplina").addEventListener("change", function(){
                
                var u = this.value;
                document.getElementById("oscar").setAttribute("value", u );
                document.getElementById("check").submit();

            });
            
        </script>
        
    </body>
</html>