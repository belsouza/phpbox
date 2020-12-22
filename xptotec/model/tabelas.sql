DROP DATABASE 3dawav2;
CREATE DATABASE IF NOT EXISTS 3dawav2;

USE 3dawav2;

CREATE TABLE IF NOT EXISTS Clientes( 
	ID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    Nome VARCHAR(50) NOT NULL,
    CPF VARCHAR(15) NOT NULL,
    Data_Nascimento DATE NOT NULL,
	CEP VARCHAR(8) NOT NULL,
	Bairro VARCHAR(30) NOT NULL,
	Numero INT NOT NULL,
	Complemento VARCHAR(30) NOT NULL,
    Celular VARCHAR(15) NOT NULL,
	Fixo VARCHAR(10) NOT NULL,	
    SENHA VARCHAR(30) NOT NULL	
);

CREATE TABLE IF NOT EXISTS Grupos_de_Carros(
	Grupo VARCHAR(5) PRIMARY KEY NOT NULL,
	Descricao VARCHAR(100) NOT NULL
);


CREATE TABLE IF NOT EXISTS Carros(
	ID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    Marca VARCHAR(30) NOT NULL,
    Modelo VARCHAR(30) NOT NULL,
    Ano YEAR NOT NULL,
	Grupo VARCHAR(5) NOT NULL,
	Versao VARCHAR(30) NOT NULL,
	Foto VARCHAR(50) NOT NULL,
	Valor DECIMAL(10,2) NOT NULL,    
	FOREIGN KEY(Grupo) REFERENCES Grupos_de_carros(Grupo)
);

CREATE TABLE IF NOT EXISTS Agencias(
	ID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	Loja VARCHAR(100) NOT NULL,
	Cidade VARCHAR(50) NOT NULL
);


CREATE TABLE IF NOT EXISTS Reservas(
	ReservaID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	Cliente INT NOT NULL,
    Carro INT NOT NULL,
    Agencia INT NOT NULL,
    Data_retirada DATE NOT NULL,
	Hora_retirada TIME NOT NULL,
	Data_devolucao DATE NOT NULL,
	Hora_devolucao TIME NOT NULL,
	FOREIGN KEY(Carro) REFERENCES Carros(ID),
	FOREIGN KEY(Agencia) REFERENCES Agencias(ID)
);

CREATE TABLE IF NOT EXISTS Catalogo(
	CarroID INT NOT NULL,
	AgenciaID INT NOT NULL,
	Estado ENUM ("Alugado", "Livre", "Reservado", "Manutenção") DEFAULT "Livre",
	FOREIGN KEY(CarroID) REFERENCES Carros(ID),
	FOREIGN KEY(AgenciaID) REFERENCES Agencias(ID)
);


INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("A", "Econômico (ECMN)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("B", "Econômico (ECMR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("C", "Econômico Com Ar (EDMR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("CK", "Econômico C/ Ar Fast (HDMR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("CS", "Econômico Sedan C/ar (EXMR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("F", "Intermediário (SDMR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("FS", "Intermediário Sedan (SXMR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("FK", "Intermediário Fast (RDMR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("FX", "Intermediário Automático (SDAR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("FW", "Intermediário Aut. Fast (RDAR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("G", "Suv (IFMR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("GX", "Suv Automático (IFAR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("GW", "Suv Aut. Fast (JFAR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("L", "Executivo (FDAR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("LK", "Executivo Fast (GZAR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("LE", "Suv Especial (XFAR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("GR", "Suv Elite (XDAR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("LP", "Prime (PDAR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("NX", "Pick-up De Luxo (PPAR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("R", "Minivan (MVMR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("RX", "Minivan Especial (MVAR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("T", "Executivo Blindado (PZAR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("U", "Furgão (MKMN)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("V", "Pick-up Com Ar (MPMR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("P", "4X4 Especial (FQMR)");
INSERT INTO Grupos_de_Carros( Grupo, Descricao ) VALUES ("J", "Van (FVMR)");


INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Volkswagen', 'Amarok', '2012', 'NX', 'V6 Extreme', 'amarok_v6_Extreme.png', '2123');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Volkswagen', 'Fox', '2008', 'A', 'Connect ', 'fox_connect.png', '2021');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Volkswagen', 'Gol', '2006', 'B', '1.6', 'gol16.png', '1309');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Volkswagen', 'Jetta', '2006', 'CS', 'Comfortline 250 TSI', 'jetta_confortline250_tsi.png', '1660');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Volkswagen', 'Nivus', '2005', 'GW', 'Comfortline 200 TSI', 'nivus_confortine200_tsi.png', '2555');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Volkswagen', 'Polo', '2004', 'B', '1.6 MSI', 'polo16_msi.png', '1126');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Volkswagen', 'Saveiro', '2007', 'NX', 'Robust CS', 'saveiro_robust_cs.png', '2654');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Volkswagen', 'T-Cross', '2006', 'GX', '200TSI', 'TCross200TSI.png', '2283');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Volkswagen', 'Tiguan Allspace', '2018', 'GX', 'R-Line 350 TSI', 'tinguan_rline_350_tsi.png', '1108');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Volkswagen', 'up!', '2007', 'C', 'Connect 170 TSI', 'up_connect_170tsi.png', '1819');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Volkswagen', 'Virtus', '2019', 'CS', '1.6MSI', 'Virtus1.6_MSI.png', '2773');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Volkswagen', 'Voyage', '2007', 'CK', '1.6', 'Voyage16.png', '2228');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Chevrolet', 'NOVO ONIX', '2015', 'A', 'Onix LI', 'flyout-onix-hb-branco.webp', '1878');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Chevrolet', 'JOY', '2017', 'B', 'Joy 1.0', 'joy-HB-black-edition.webp', '2583');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Chevrolet', 'JOY PLUS', '2013', 'FS', 'Joy 1.6', 'joy-plus-black.webp', '1570');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Chevrolet', 'NOVO ONIX PLUS', '2009', 'FS', 'Ônix Plus', 'joy-HB-black-edition.webp', '1036');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Chevrolet', 'NOVO CRUZE', '2010', 'FS', 'Cruze', 'cruze-premier.webp', '1281');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Chevrolet', 'NOVO CRUZE SPORT6', '2009', 'FX', 'Sport 6', 'cruze-sport6-premier.webp', '2714');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Chevrolet', 'SPIN', '2009', 'FS', 'Spin 1.0', 'spin-premier-azul-eclipse-lateral-rigida.webp', '2986');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Chevrolet', 'SPIN ACTIV', '2020', 'A', 'Spin 1.5', 'chevrolet-spin-activ-2021.webp', '1966');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Chevrolet', 'NOVO TRACKER', '2014', 'GR', 'Tracker', 'novo-tracker.webp', '2851');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Chevrolet', 'EQUINOX', '2015', 'GR', 'Equinox', 'equinox.webp', '2134');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Chevrolet', 'TRAILBLAZER', '2017', 'LE', 'Trailblazer', 'Chevrolet Trailblazer 2021.webp', '2002');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Chevrolet', 'NOVA S10 HIGH COUNTRY', '2010', 'NX', 'Country L0', 'chevrolet-s10-high-country-2021.webp', '1726');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Chevrolet', 'NOVA S10 CABINE DUPLA', '2006', 'V', 'Dupla L0', 'chevrolet-s10-cabine-dupla-2021.webp', '2512');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Chevrolet', 'NOVA S10 CABINE SIMPLES', '2006', 'P', 'Simples L0', 'chevrolet-s10-cabine-simples-2021.webp', '2771');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Chevrolet', 'MONTANA', '2012', 'V', 'Montana LN', 'jelly-flyout-menu-404x161.webp', '2553');
INSERT INTO `carros` (`ID`, `Marca`, `Modelo`, `Ano`, `Grupo`, `Versao`, `Foto`, `Valor`) VALUES (NULL, 'Chevrolet', 'NOVO CAMARO 2020', '2016', 'LP', 'Ônix Camaro 2020', 'camaro-2020.webp', '1325');


    