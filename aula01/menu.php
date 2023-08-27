<?php
    /*  Crie um arquivo "menu.php" que exiba o menu abaixo para o
        usuário:
            1) Maior de dois
            2) Maior de três
            3) Sair
        Leia a resposta do usuário.
        Se opção escolhida for "1" ou "2", solicite do usuário os
        números e utilize as funções criadas anteriormente para
        imprimir o maior deles.
        Se a opção escolhida for "3", finalize o programa.
        Caso contrário, exiba novamente o menu para o usuário,
        solicitando sua resposta.
    */
    require_once 'maior-de-dois.php';
    require_once 'maior-de-tres.php';

    const OPCAO_MAIOR_DE_DOIS = '1';
    const OPCAO_MAIOR_DE_TRES = '2';

    do {
        echo "1 - Maior de dois", PHP_EOL;
        echo "2 - Maior de tres", PHP_EOL;
        echo "0 - Sair", PHP_EOL;

        $opcao = readline("Digite sua opcao: ");

        switch($opcao){
            case OPCAO_MAIOR_DE_DOIS:
                $primeiro = readline("Digite o primeiro numero: ");
                $segundo = readline("Digite o segundo numero: ");

                $maiorNumero = maiorDeDois((int) $primeiro, (int) $segundo);
                echo "O maior numero digitado e: $maiorNumero\n";
                break;
            case OPCAO_MAIOR_DE_TRES:
                $primeiro = readline("Digite o primeiro numero: ");
                $segundo = readline("Digite o segundo numero: ");
                $terceiro = readline("Digite o terceiro numero: ");

                $maiorNumero = maiorDeTres((int) $primeiro, (int) $segundo, (int) $terceiro);
                echo "O maior numero digitado e: $maiorNumero\n";
                break;
            default:
                echo "Opcao invalida.";
        }

    } while ($opcao != 0)
?>