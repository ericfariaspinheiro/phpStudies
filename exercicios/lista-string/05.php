<?php
    function ocorrencias($lista){
        $ocorrecias = [];

        foreach($lista as $item){
            if($ocorrecias[$item]){
                $ocorrecias[$item]++;
            } else {
                $ocorrecias[$item] = 1;
            }
        }

        return $ocorrecias;
    }

    $dados = [ 'carro', 'carro', 'caminhão', 'caminhão', 'bicicleta', 'caminhada', 'carro', 'van', 'bicicleta', 'caminhada', 'carro', 'van', 'carro', 'caminhão' ];
    print_r(ocorrencias($dados));
?>