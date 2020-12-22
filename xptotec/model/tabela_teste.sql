INSERT INTO `clientes` (`ID`, `Nome`, `CPF`, `Data_Nascimento`, `CEP`, `Bairro`, `Numero`, `Complemento`, `Celular`, `Fixo`, `SENHA`) VALUES (NULL, 'Merina Delgado', '52306429715', '1987-8-1', '21635270', 'Anchieta', '665', 'Casa', '9999055015', '33339219', '123456');

INSERT INTO `catalogo` (`CarroID`, `AgenciaID`, `Estado`) VALUES ('26', '1', 'Alugado'), ('18', '2', 'Reservado');

SELECT  reservas.carro  FROM `reservas`WHERE `Agencia`= '5' AND `Data_retirada` >= '2020-12-19' AND  `Data_devolucao`<='2020-12-21';

SELECT carros.ID FROM carros, agencias, catalogo, reservas  WHERE catalogo.CarroID = reservas.Carro AND catalogo.AgenciaID = reservas.Agencia;
