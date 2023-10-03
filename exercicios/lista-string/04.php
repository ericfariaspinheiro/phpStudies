<?php
    // A
    function filtraDados($matrizInventor){
        $matrizFiltrada = [];

        foreach($matrizInventor as $arrayInventor) {
            $arrayFiltrada = [];
        
            $arrayFiltrada['nome'] []= $arrayInventor['nome'];
            $arrayFiltrada['viveu'] []= $arrayInventor['morte'] - $arrayInventor['nasc'];
            
            $matrizFiltrada []= $arrayFiltrada;
        }
        return $matrizFiltrada;
    }

    // B
    function mediaIdade($matrizInventor){
        $somaIdades= 0;

        foreach($matrizInventor as $arrayInventor){
            $somaIdades += $arrayInventor['morte'] - $arrayInventor['nasc'];
        }

        return ($somaIdades / count($matrizInventor));
    }

    // C

    function filtrarSeculo($matrizInventor, $seculo){
        $matrizFiltrada = [];

        foreach($matrizInventor as $arrayInventor){
            if(mb_substr($arrayInventor['nasc'], 0, 2) == $seculo || mb_substr($arrayInventor['morte'], 0, 2) == $seculo) {
                $matrizFiltrada []= $arrayInventor;
            }
        }

        return $matrizFiltrada;
    }

    // D

    function ordenarInventores($matrizInventor) {
        
    }




    $inventores = [
        [ "nome" => 'Albert', "sobrenome" => 'Einstein', "nasc" => 1879, "morte" => 1955 ],
        [ "nome" => 'Isaac', "sobrenome" => 'Newton', "nasc" => 1643, "morte" => 1727 ],
        [ "nome" => 'Galileo', "sobrenome" => 'Galilei', "nasc" => 1564, "morte" => 1642 ],
        [ "nome" => 'Nicolaus', "sobrenome" => 'Copernicus', "nasc" => 1473, "morte" => 1543 ],
        [ "nome" => 'Ada', "sobrenome" => 'Lovelace', "nasc" => 1815, "morte" => 1852 ]
    ];

    // print_r(filtraDados($inventores));
    // echo mediaIdade($inventores);
    print_r(filtrarSeculo($inventores, 16));

?>