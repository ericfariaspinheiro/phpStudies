<?php
    // Forma 01
    function numerosRepetidos($lista){
        $repetidos = [];
        $strRepetidos = '';
        foreach($lista as $numero){
            if($repetidos[$numero]) {
                $strRepetidos .= ($numero . " ");
            } else {
                $repetidos[$numero] = 1;
            }
        }

        return $strRepetidos;
    }

    // Forma 02
    function telefonesRepetidos($lista) {
        $unicos = [];
        $repetidos = [];

        foreach($lista as $numero) {
            if(!in_array($numero, $unicos)){
                $unicos []= $numero;
            } else {
                $repetidos []= $numero;
            }
        }

        return $repetidos;
    }

    print_r(telefonesRepetidos(["30044000", "2225271727", "22987654321", "08007024000", "30044000", "22987654321"]));
    
?>