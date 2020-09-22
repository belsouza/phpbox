<?php

$arquivo = fopen("lorem.txt","r") or die("Cannot open");
while(!feof($arquivo)){
    echo fgets($arquivo)."<br/>";
}

?>