<?php


$arquivo = fopen("data.csv","r") or die("Cannot open");
while(!feof($arquivo)){
    echo fgets($arquivo)."<br/>";
}

?>