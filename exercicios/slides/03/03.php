<?php
    function cubo($valores){
        $listaCubo = [];

        foreach($valores as $valor){
            $listaCubo []= pow($valor, 3);
        }

        return $listaCubo;
    }

    $lista = [1,2,3,4,5];
    print_r(cubo($lista));
?>