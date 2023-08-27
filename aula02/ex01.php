<?php
    /* 
        Solicite do usuário o número de um mês. Se o mês estiver no segundo
        semestre, imprima o nome por extenso, conforme os valores do array.
        Do contrário, informe que o mês não está no segundo semestre. 
    */

    $meses = [
        '7' => 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'
    ];

    $mesEscolhido = readline("Digite o numero de um mes do ano: ");

    if ($mesEscolhido < 1 || $mesEscolhido > 12) {
        echo "Numero invalido.";
    } elseif($mesEscolhido < 7){
        echo "Nao esta no segundo semestre\n";
    } else {
        echo $meses[$mesEscolhido];
    }
?>