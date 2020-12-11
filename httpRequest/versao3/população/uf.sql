DROP DATABASE IF EXISTS 3dawsource;
CREATE database 3dawsource;
USE 3dawsource;

CREATE TABLE IF NOT EXISTS Estados(
	Sigla VARCHAR(2) NOT NULL,
    Nome VARCHAR(30) NOT NULL, 
    CONSTRAINT UF PRIMARY KEY (Sigla)
);

INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('AC', 'Acre');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('AL', 'Alagoas');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('AM', 'Amazonas');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('AP', 'Amapá');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('BA', 'Bahia');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('CE', 'Ceará');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('DF', 'Distrito Federal');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('ES', 'Espírito Santo');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('GO', 'Goiás');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('MA', 'Maranhão');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('MT', 'Mato Grosso');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('MS', 'Mato Grosso do Sul');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('MG', 'Minas Gerais');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('PA', 'Pará');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('PB', 'Paraíba');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('PR', 'Paraná');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('PE', 'Pernambuco');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('PI', 'Piauí');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('RJ', 'Rio de Janeiro');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('RN', 'Rio Grande do Norte');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('RS', 'Rio Grande do Sul');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('RO', 'Rondônia');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('RR', 'Roraima');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('SC', 'Santa Catarina');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('SP', 'São Paulo');
INSERT INTO 3dawsource.estados (Sigla, Nome) VALUES ('TO', 'Tocantins');


