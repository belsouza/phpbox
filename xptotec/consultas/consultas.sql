Select * from carros
where not exists(
Select * from reserva rsv
inner join Carros cr on (cr.carro = rsv.carro)
where cidade=pCidade and dataInincio <= pDataInicio
and dataFinal => pDataFinal
)


Select * from reserva
where cidade=pCidade and dataInincio <= pDataInicio
and dataFinal => pDataFinal

SELECT carros.ID, carros.Marca, agencias.Cidade, catalogo.Estado FROM carros, agencias, catalogo 
WHERE carros.id = catalogo.CarroID AND agencias.ID = catalogo.AgenciaID AND catalogo.Estado = "Livre"