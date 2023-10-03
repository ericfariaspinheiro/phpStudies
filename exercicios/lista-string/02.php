<?php
    require_once '01.php';

    function formataListaTelefones($lista) {
        $listaFormatada = [];

        foreach($lista as $tel){
            array_push($listaFormatada, formataTelefone($tel));
        }

        return $listaFormatada;
    }

    $formatado =  formataListaTelefones(["30044000", "2225271727", "22987654321", "08007024000"]);
    foreach($formatado as $tel){
        echo $tel, PHP_EOL;
    }
?>