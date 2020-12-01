
CREATE TABLE IF NOT EXISTS Alunos (

    Matricula VARCHAR(7) PRIMARY KEY NOT NULL,
    Nome VARCHAR(50) NOT NULL,
    CPF VARCHAR(11) NOT NULL,
    DataNascimento DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS Disciplinas (
    
    Disciplina VARCHAR(7) NOT NULL,
    Descricao VARCHAR(100) NOT NULL,
    Periodo INT NOT NULL,
    Tipo ENUM ('Obrigatorio', 'Eletiva'),
    NCreditos INT NOT NULL,
    CH INT NOT NULL,
    UNIQUE (Disciplina)
);

CREATE TABLE IF NOT EXISTS Matriculas (
    
    Matricula VARCHAR(7) PRIMARY KEY NOT NULL,
    Periodo INT NOT NULL,
    Horas_Cursadas INT NOT NULL,
    INDEX( Matricula ),
    FOREIGN KEY (Matricula) REFERENCES Alunos( Matricula )
);

CREATE TABLE IF NOT EXISTS Matriculas_Cursadas ( 

    Matricula VARCHAR(7) NOT NULL,
    Periodo INT NOT NULL,
    Ano YEAR NOT NULL,
    Disciplina VARCHAR(7) NOT NULL,
    Situacao ENUM ("Aprovado", "Reprovado", "Cursando"),
    INDEX(Matricula),
    FOREIGN KEY (Matricula) REFERENCES Alunos( Matricula ),
    INDEX( Disciplina ),
    FOREIGN KEY (Disciplina) REFERENCES Disciplinas( Disciplina )
);


CREATE TABLE IF NOT EXISTS Professores (

    ID VARCHAR(7) UNIQUE PRIMARY KEY NOT NULL,
    Nome VARCHAR(100) NOT NULL,
    Disciplina VARCHAR(7) NOT NULL,
    Turno ENUM ('Manhã', 'Noite'),
    INDEX (Disciplina ),
    FOREIGN KEY (Disciplina) REFERENCES Disciplinas( Disciplina )
);

CREATE TABLE IF NOT EXISTS Disciplinas_Requisitos ( 

    Disciplina VARCHAR(7) NOT NULL, 
    Pre_requisito VARCHAR(7)  NULL,
    INDEX  NDisciplina (Disciplina),
    FOREIGN KEY (Disciplina) REFERENCES Disciplinas(Disciplina),
    INDEX VDisciplina (Pre_requisito),    
    FOREIGN KEY (Pre_requisito) REFERENCES Disciplinas(Disciplina)
);


CREATE TABLE IF NOT EXISTS Turmas (

    TurmaID VARCHAR(5) UNIQUE NOT NULL,
    Sala INT NOT NULL,
    Materias VARCHAR(7) NOT NULL,
    HorarioInicio VARCHAR(6) NOT NULL,
    HorarioFim VARCHAR(6) NOT NULL,
    DiaSemana ENUM ('Segunda-feira', 'Terça-Feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo') DEFAULT 'Domingo',
    INDEX(Materias),
    FOREIGN KEy (Materias) REFERENCES Disciplinas(Disciplina)
);

CREATE TABLE IF NOT EXISTS Matricula_Efetiva (
    
    MAluno VARCHAR(7) PRIMARY KEY NOT NULL,
    MDisciplina VARCHAR(7) NOT NULL,
    Periodo INT NOT NULL,
    Turma VARCHAR(5) NOT NULL,
    INDEX( MAluno ),
    FOREIGN KEY (MAluno) REFERENCES Alunos( Matricula ),
    INDEX(MDisciplina),
    FOREIGN KEY (MDisciplina) REFERENCES Disciplinas(Disciplina),
    INDEX(Turma),
    FOREIGN KEY (Turma) REFERENCES turmas(TurmaID)
);




