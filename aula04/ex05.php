<?php    
// DESAFIO PARA CASA:

// Crie uma função "transformarEmNome" que receba um
// nome qualquer (em letras maiúsculas, minúsculas, ou
// misturadas) e um array de exceções, contendo palavras
// que devem ser mantidas, em letras minúsculas, tal como "da"
// "de", "do", etc. Todas as palavras, exceto as exceções, devem    
// ficar com o primeiro caractere em maiúsculo e as demais em minúsculas. 
// Por exemplo: transformarEmNome( 'ANA DE SOUZA', [ 'de', 'da' ] )
// deve retornar "Ana de Souza" (ou seja, o "de" ficar em minúsculas).

    function transformarEmNome($nome, $excecoes){
        $arrayNome = explode(" ", $nome);
        $nomeFormatado = [];
        
        foreach($arrayNome as $parteNome){
            $parteNomeMinusculo = strtolower($parteNome);

                if(in_array($parteNomeMinusculo, $excecoes)){
                    $nomeFormatado []= $parteNomeMinusculo;
                } else {
                    $nomeFormatado []= strtoupper($parteNomeMinusculo[0]) . substr($parteNomeMinusculo, 1);                    
                }                        
        }

        return implode(" ", $nomeFormatado);
    }

    echo transformarEmNome( 'ANA DE SOUZA', [ 'de', 'da' ] );
?>