<?php
// Crie uma função mudarSeparadorData que receba uma data
// no formato "dd/mm/aaaa" e um separador e retorne a data
// com o separador indicado. Exemplo:
// mudarSeparadorData( '17/08/2023', '-' ) deve retornar
// '17-08-2023'.

    function mudarSeparadorData($data, $separador){
        return str_replace("/",$separador, $data);
    }

    $dataOriginal = readline("Digite uma data: ");
    $separadorOriginal = readline("Digite um separador: ");

    echo "Data com o novo separador: ", mudarSeparadorData($dataOriginal, $separadorOriginal);
?>