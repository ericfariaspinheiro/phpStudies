<?php
    $conteudo = file_get_contents('pereciveis.csv');
    $linhas = explode("\n", $conteudo);
    array_shift($linhas);

    $vencidos = [];
    
    foreach($linhas as $linha){
        $dados = explode(";", $linha);
        $data = explode("/", $dados[1]);

        if($data[0] > 5 && $data[1] == 5 && $data[2] == 2023){
            $tempoVencido = $data[0] - 5;
            $vencidos []= [$dados[0], $tempoVencido];
        } elseif ($data[1] >= 5 && $data[2] == 2023){
            $tempoVencido = ($data[1]*30 + $data[0]) - (30 * 5 + 5);
            $vencidos []= [$dados[0], $tempoVencido];
        } elseif ($data[2] > 2023){
            $tempoVencido = ((($data[2] - 1) * 12) + ($data[1] + 30) + $data[0]) - (((2023-1) * 12) + (5 * 30) + 5);
        }
    }

    foreach($vencidos as $vencido){
        if($vencido[1] > 0){
            echo $vencido[0] . " está vencido a " . $vencido[1] . " dia(s).", PHP_EOL;
        }
    }
?>