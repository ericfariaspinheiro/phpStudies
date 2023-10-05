<?php
    function media($valores){
        $total = 0;

        foreach($valores as $valor){
            $total += $valor;
        }

        return ($total / count($valores));
    }

    $randomNumbers = [];
    
    for($i = 0; $i < 10; $i++){
        $randomNumbers []= rand(1,100);
    }

    print_r($randomNumbers);
    echo media($randomNumbers), PHP_EOL;
?>