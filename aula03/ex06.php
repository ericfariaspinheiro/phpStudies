<?php
    // DESAFIO PARA CASA: Modifique as funções cadastrar
    // e alterar para, após adicionar/alterar um elemento,
    // ordene o array pelo código. Para isso, pesquisa a função
    // de ordenação de arrays no site do PHP, https://php.net.

require_once 'produtos.php';

const OPCAO_PESQUISAR = '1';
const OPCAO_LISTAR = '2';
const OPCAO_CADASTRAR = '3';
const OPCAO_REMOVER = '4';
const OPCAO_ALTERAR = '5';

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

    function custom_sort($a, $b){
        return $a['codigo'] > $b['codigo'];
    }

    usort($lista, "custom_sort");
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


function alterarProduto(&$lista)
{
    $encontrado = false;
    $valorBuscado = readline("Digite a descricao ou o codigo do produto: ");
    foreach ($lista as &$produto) {
        if ($produto['codigo'] == $valorBuscado || $produto['descricao'] == $valorBuscado) {
            $encontrado = true;

            $codigo = readline("Digite o novo codigo: ");
            $descricao = readline("Digite a nova descricao: ");
            $estoque = intval(readline("Digite a nova quantidade do estoque: "));
            $preco = floatval(readline("Digite o novo preco: "));

            $produto = [
                'codigo' => $codigo,
                'descricao' => $descricao,
                'estoque' => $estoque,
                'preco' => $preco
            ];

            function custom_sort($a, $b){
                return $a['codigo'] > $b['codigo'];
            }
        
            usort($lista, "custom_sort");

            echo "Produto alterado.\n";
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
        echo "5) ALTERAR", PHP_EOL;

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
            case OPCAO_ALTERAR:
                alterarProduto($produtos);
                break;
            default:
                echo "Opcao invalida.";
        }
    } while ($opcao != 0);
}

menu($produtos);
