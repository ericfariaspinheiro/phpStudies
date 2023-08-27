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
    $totalEstoque = 0;
    $totalPreco = 0.00;

    foreach ($lista as $produto) {
        foreach ($produto as $chave => $valor) {
            if ($chave == 'estoque') {
                $totalEstoque += $valor;
            } elseif ($chave == 'preco') {
                $totalPreco += $valor;
            }
            echo "$chave: $valor\n";
        }
        echo str_repeat("-", 25), "\n";
    }
    echo "Total em estoque: $totalEstoque\nValor total: $totalPreco";
}

do {
    echo "0) SAIR", PHP_EOL;
    echo "1) PESQUISAR", PHP_EOL;
    echo "2) LISTAR", PHP_EOL;

    $opcao = readline("Digita uma opcao: ");

    switch ($opcao) {
        case OPCAO_PESQUISAR:
            pesquisarProduto($produtos);
            break;
        case OPCAO_LISTAR:
            listarProdutos($produtos);
            break;
        default:
            echo "Opcao invalida.";
    }
} while ($opcao != 0);
