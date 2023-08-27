<?php

//    Crie um arquivo 02.php a partir do 01.php e modifique-o
//    para apresentar um menu com as opções abaixo:
//    0) SAIR
//    1) PESQUISAR
//    2) LISTAR
//    Faça uma função para realizar o comportamento da listagem
//    implementada no exercício anterior e crie uma função para
//    listar todos os produtos existentes, totalizando, ao final,
//    o estoque e o preço de todos os produtos.

require_once 'produtos.php';

const OPCAO_PESQUISAR = '1';
const OPCAO_LISTAR = '2';

function pesquisarProduto($lista)
{
    $encontrado = false;
    $valorBuscado = readline("Digite a descricao ou o codigo do produto: ");
    foreach ($lista as $produto) {
        if ($produto['codigo'] == $valorBuscado || $produto['descricao'] == $valorBuscado) {
            $encontrado = true;
            echo "Preco: $produto[preco]\nEstoque: $produto[estoque]\n";
        }
    }

    if (!$encontrado) {
        echo "Produto nao encontrado\n";
    }
}

function listarProdutos($lista)
{
}

do {
    echo "0) SAIR", PHP_EOL;
    echo "1) PESQUISAR", PHP_EOL;
    echo "0) LISTAR", PHP_EOL;

    $opcao = readline("Digita uma opcao: ");

    switch ($opcao) {
        case OPCAO_PESQUISAR:

            pesquisarProduto($produtos);
            break;
        case OPCAO_LISTAR:
            break;
        default:
            echo "Opcao invalida.";
    }
} while ($opcao != 0);
