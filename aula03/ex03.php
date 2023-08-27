<?php
//    Crie um arquivo 03.php a partir do 02.php e modifique-o para
//    adicionar uma opção "3) CADASTAR", que solicite um novo produto
//    e o cadastre no array de produtos. Cuide para que o estoque e
//    o preço sejam cadastrados como int e float, respectivamente.

require_once 'produtos.php';

const OPCAO_PESQUISAR = '1';
const OPCAO_LISTAR = '2';
const OPCAO_CADASTRAR = '3';

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

function cadastrarProduto(&$lista)
{
    $codigo = readline("Digite o codigo: ");
    $descricao = readline("Digite a descricao: ");
    $estoque = intval(readline("Digite a quantidade do estoque: "));
    $preco = floatval(readline("Digite o preco: "));

    $produto = [
        'codigo' => $codigo,
        'descricao' => $descricao,
        'estoque' => $estoque,
        'preco' => $preco
    ];

    $lista[] = $produto;
}

function menu($produtos)
{
    do {
        echo "0) SAIR", PHP_EOL;
        echo "1) PESQUISAR", PHP_EOL;
        echo "2) LISTAR", PHP_EOL;
        echo "3) CADASTRAR", PHP_EOL;

        $opcao = readline("Digita uma opcao: ");

        switch ($opcao) {
            case OPCAO_PESQUISAR:

                pesquisarProduto($produtos);
                break;
            case OPCAO_LISTAR:
            case OPCAO_CADASTRAR:
                cadastrarProduto($produtos);
                break;
            default:
                echo "Opcao invalida.";
        }
    } while ($opcao != 0);
}

menu($produtos);
