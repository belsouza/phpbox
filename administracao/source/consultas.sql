SELECT MAX( Matriculas.Periodo ) FROM Matriculas WHERE Matricula = 'A0015';

SELECT Alunos.Nome, MAX( Matriculas.Periodo ) FROM Alunos, Matriculas WHERE Alunos.Matricula = 'A0015' AND Matriculas.Matricula = 'A0015';

SELECT COUNT(Disciplina) FROM disciplinas_requisitos WHERE Disciplina = 'ACH0021';

SELECT COUNT(Pre_requisito) FROM disciplinas_requisitos WHERE Disciplina = 'ACH2023';

SELECT disciplinas.disciplina FROM Disciplinas WHERE Disciplinas.Periodo = 2 UNION SELECT matriculas_cursadas.disciplina FROM matriculas_cursadas WHERE matriculas_cursadas.situacao = 'Reprovado';

SELECT Alunos.Matricula FROM Alunos
UNION
SELECT Professores.ID FROM Professores;

