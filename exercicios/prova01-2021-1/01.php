<?php
    function contabilizar($arrayString){
        $ocorrencias = [];

        foreach($arrayString as $item){
            if(isset($ocorrencias[$item])){
                $ocorrencias[$item]++;
            } else {
                $ocorrencias[$item] = 1;
            }
        }

        return $ocorrencias;
    }

    $entrada = ['maca', 'uva', 'maca', 'banana', 'goiaba', 'uva', 'maca', 'banana'];
    $saida = contabilizar($entrada);
    var_dump($saida);
?>