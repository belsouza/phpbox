<?php 

echo "Alunos exportacao";
$arquivoSaida = fopen("AlunosExportacao.txt","w+") or die("cannot open");
$linha = "matricula;nome;endereco;cep;cidade;estado;cpf;datanascimento\r\n";
fwrite($arquivoSaida, $linha);
$linha = "001;James;rua Pororoca;12345-556;Mato Grosso;PA;02554;11/11/1911\r\n";
fwrite($arquivoSaida, $linha);
fclose($arquivoSaida);

?>