<?php
    /* 
        Crie um arquivo "maior-de-tres.php" que contenha uma função "maiorDeTres"
        que retorne o maior de três números recebidos como argumento. Para isso,
        utilize a função "maiorDeDois", importando o arquivo usando require_once,
        assim:
            require_once 'maior-de-dois.php' 
    */

    require_once 'maior-de-dois.php';

    function maiorDeTres ($primeiro, $segundo, $terceiro){
        $resultadoParcial = maiorDeDois($primeiro, $segundo);
        return maiorDeDois($resultadoParcial, $terceiro);
    }

    // $primeiro = readline("Digite o primeiro numero: ");
    // $segundo = readline("Digite o segundo numero: ");
    // $terceiro = readline("Digite o terceiro numero: ");

    // $maiorNumero = maiorDeTres($primeiro, $segundo, $terceiro);
    // echo "O maior numero digitado e: $maiorNumero";
?>