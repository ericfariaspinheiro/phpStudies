<?php
    // Crie uma função "inverter" que retorne uma string
    // invertida, fornecida como argumento. Para isso, não
    // utilize uma função "pronta" do PHP que faça isso.

    function inverterString($string){
        for($i = 0; $i < floor(mb_strlen($string)/2); $i++){
            $letraInicial = $string[$i];
            $letraFinal = $string[mb_strlen($string) - 1 - $i];
            $string[$i] = $letraFinal;
            $string[mb_strlen($string) - 1 - $i] = $letraInicial;
        }

        echo "String invertida: $string";
    }

    $string = readline("Digite a frase: ");
    inverterString($string);
?>