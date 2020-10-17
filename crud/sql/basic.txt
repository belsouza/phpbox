CREATE USER '3daw'@'localhost' IDENTIFIED BY 'mysql123';
GRANT ALL PRIVILEGES ON *.* TO '3daw'@'localhost';

#SELECT <COLUNAS> FROM <NOME TABELA> WHERE ...

# SELECT Matricula, Nome, CPF, DataNascimento from Alunos where mat = $mat
# SELECT * from Alunos where mat = $mat
# SELECT * from Alunos where Nome = $nome
# UPDATE from Alunos set Nome = $nome, CPF = $cpf, dtNasc = $dtNasc Where mat = $mat
# DELETE * FROM Alunos


# TABELA SE MATRICULA É INTEIRO
CREATE TABLE IF NOT EXISTS 3dawtest.Alunos(
	
	Matricula VARCHAR UNSIGNED PRIMARY KEY,
	Nome VARCHAR(50) NOT NULL,
	CPF VARCHAR(11) NOT NULL,
	DataNascimento VARCHAR(15) NOT NULL
);


#TABELA PARA MATRICULA VARCHAR
CREATE TABLE IF NOT EXISTS 3dawtest.Alunos(
	
	Matricula VARCHAR(7) PRIMARY KEY,
	Nome VARCHAR(50) NOT NULL,
	CPF VARCHAR(16) NOT NULL,
	DataNascimento VARCHAR(15) NOT NULL
);


# $sql = "INSERT into Alunos (Matricula, Nome, CPF, DataNascimento) VALUES ( '{$mat}', '{$nome}',  '{$cpf}',  '{$dtNasc}' )" ;
   

