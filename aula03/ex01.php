<?php
// Crie um programa que solicite a descrição ou
// o código de um produto e informe seu preço
// e sua quantidade em estoque.

require_once 'produtos.php';
$encontrado = false;

function buscarProduto($buscar)
{
    global $produtos;
    global $encontrado;
    foreach ($produtos as $produto) {
        if ($produto['codigo'] == $buscar || $produto['descricao'] == $buscar) {
            $encontrado = true;
            echo "Preco: $produto[preco]\nEstoque: $produto[estoque]\n";
        }
    }
}

$valorBuscado = readline("Digite a descricao ou o codigo do produto: ");
buscarProduto($valorBuscado);

if (!$encontrado) {
    echo "Produto nao encontrado.";
}
