<?php


$arquivo = fopen("data.csv","r") or die("Cannot open");
//echo fread($arquivo). "<br/>";

echo fgets($arquivo)."<br/>";
echo fgets($arquivo)."<br/>";
echo fgets($arquivo)."<br/>";

if(feof($arquivo)){
    echo "Fim de arquivo";
}

?>