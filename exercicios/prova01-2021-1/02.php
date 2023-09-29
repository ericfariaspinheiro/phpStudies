<?php
    function itensComecandoCom($letra, $palavras) {
        $itens = [];

        foreach($palavras as $palavra){
            if(mb_strtolower($palavra)[0] == $letra){
                array_push($itens, $palavra);
            }
        }

        return $itens;
    }

    $entrada = [ 'Pedro', 'pedra', 'cinto', 'lápis', 'Camila', 'dado' ];
    $saida = itensComecandoCom( 'c', $entrada );
    print_r( $saida );
?>