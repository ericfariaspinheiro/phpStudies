<?php
    require_once '07.php';
    require_once '08.php';

    function palindromo($texto){
        $semDiacriticos = removerDiacriticos($texto);
        $semPontuacao = removerPontuacao($semDiacriticos);
        $invertido = "";

        for($index = (strlen($semPontuacao) - 1); $index >= 0;$index--){
            $invertido .= $semPontuacao[$index];
        }
        
        return strcasecmp($semPontuacao, $invertido) == 0 ? "Eh palindromo" : "Nao eh palindromo";
    }

    echo palindromo("Sá da tapas e sapatadas"), PHP_EOL;
    echo palindromo("Hoje é sabado");
?>