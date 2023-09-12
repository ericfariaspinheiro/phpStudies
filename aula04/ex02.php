<?php
// Crie uma função "sobrenomePrimeiro" que receba um
// nome no formato "Ana de Souza" e retorne o nome no
// formato "de Souza, Ana".

    function sobrenomePrimeiro($nomeCompleto){
        $indice = mb_strpos($nomeCompleto, " ");
        if ($indice == false) {
            return $nomeCompleto;
        }

        $primeiroNome = mb_substr($nomeCompleto, 0, $indice);
        $restante = mb_substr($nomeCompleto, $indice + 1);
        return $restante . ', ' . $primeiroNome;
    }

    echo sobrenomePrimeiro("Ana de Souza");
?>