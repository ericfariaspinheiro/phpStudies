<?php

// Crie um array de frutas como o do exercício anterior.
// Solicite do usuário o nome de uma fruta e, utilizando
// foreach, verifique se o nome informado está contido no
// array de frutas. Se estiver, imprima "encontrado" e
// interrompa a execução do laço. Se não for encontrado,
// imprima "não encontrado".

$frutas = ['Banana', 'Maçã', 'Abacate'];

$fruta = readline("Digite o nome de uma fruta: ");
$encontrado = false;

foreach ($frutas as $valor) {
    if ($fruta == $valor) {
        $encontrado = true;
        break;
    }
}

echo $encontrado ? "Encontrado." : "Não encontrado";
