<?php
// Crie uma função "palindromos" que receba duas strings
// e retorne true se uma string for igual à outra invertida.
// Compare-as de forma insensível à maiúsculas e minúsculas.
// DICA: Considere reutilizar a função do exercício 1.

    function palindromos($palavra1, $palavra2){
        $palavra1 = strtolower($palavra1);
        $palavra2 = strtolower($palavra2);

        if(mb_strlen($palavra1) != mb_strlen($palavra2)){
            return false;
        }

        $palavra1Invertida = "";
        for($i = mb_strlen($palavra1) - 1; $i >= 0 ; $i--){
            $palavra1Invertida .= $palavra1[$i];            
        }
        
        return $palavra1Invertida === $palavra2;
            
    }
    
    echo palindromos("eriC", "cirE");
?>