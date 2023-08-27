<?php
//    Crie um arquivo 04.php a partir do 03.php e modifique-o para
//    adicionar uma opção "4) REMOVER", que utilize a pesquisa
//    por nome ou por código para encontrar um produto e então
//    removê-lo.

require_once 'produtos.php';

const OPCAO_PESQUISAR = '1';
const OPCAO_LISTAR = '2';
const OPCAO_CADASTRAR = '3';
const OPCAO_REMOVER = '4';

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

function removeProduto(&$lista)
{
    $encontrado = false;
    $valorRemover = readline("Digite a descricao ou o codigo do produto: ");
    foreach ($lista as $indice => $produto) {
        if ($produto['codigo'] == $valorRemover || $produto['descricao'] == $valorRemover) {
            $encontrado = true;
            unset($lista[$indice]);
            echo 'Removido da posição ', $indice, PHP_EOL;
        }
    }

    if (!$encontrado) {
        echo "Produto nao encontrado\n";
    }
}

function menu($produtos)
{
    do {
        echo "0) SAIR", PHP_EOL;
        echo "1) PESQUISAR", PHP_EOL;
        echo "2) LISTAR", PHP_EOL;
        echo "3) CADASTRAR", PHP_EOL;
        echo "4) REMOVER", PHP_EOL;

        $opcao = readline("Digita uma opcao: ");

        switch ($opcao) {
            case OPCAO_PESQUISAR:
                pesquisarProduto($produtos);
                break;
            case OPCAO_LISTAR:
                listarProdutos($produtos);
                break;
            case OPCAO_CADASTRAR:
                cadastrarProduto($produtos);
                break;
            case OPCAO_REMOVER:
                removeProduto($produtos);
                break;
            default:
                echo "Opcao invalida.";
        }
    } while ($opcao != 0);
}

menu($produtos);
