<?php

// Modifique o exercício anterior para imprimir a posição
// que o elemento está no array. Por exemplo:
// "Encontrado no índice 3"

$frutas = ['Banana', 'Maçã', 'Abacate'];

$fruta = readline("Digite o nome de uma fruta: ");
$encontrado = false;

foreach ($frutas as $chave => $valor) {
    if ($fruta == $valor) {
        $encontrado = true;
        echo "Encontrado no indice ", $chave;
        break;
    }
}

if (!$encontrado) {
    echo "Não encontrado";
}
