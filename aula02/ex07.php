<?php

// Utilize o array de frutas do exercício anterior.
// Leia do usuário o nome de uma fruta a ser excluída do
// array. Caso a fruta seja encontrada, exclua-a do array.
// Do contrário, imprima "não encontrada".
// Na última linha de código do arquivo, imprima o array. <<<

$frutas = ['Banana', 'Maçã', 'Abacate'];

$apagarFruta = readline("Digite uma fruta a ser excluida: ");
$encontrado = false;

foreach ($frutas as $index => $fruta) {
    if ($fruta == $apagarFruta) {
        unset($frutas[$index]);
        $encontrado = true;
        break;
    }
}

if (!$encontrado) {
    echo "Nao encontrada.";
}

print_r($frutas);
