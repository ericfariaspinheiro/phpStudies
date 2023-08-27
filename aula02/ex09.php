<?php
// Adicione ao programa uma opção para remover uma fruta.

const OPCAO_LISTAR = '1';
const OPCAO_CADASTRAR = '2';
const OPCAO_REMOVER = '3';


function listarFrutas($lista)
{
    print_r($lista);
}

function cadastrarFruta(&$lista)
{
    $novaFruta = readline("Digte o nome da fruta: ");
    $lista[] = $novaFruta;
    print_r($lista);
}

function removerFruta(&$lista)
{
    $removerFruta = readline("Digte o nome da fruta a ser removida: ");
    $index = array_search($removerFruta, $lista);
    if ($index === false) {
        echo "Fruta nao encontrada.";
        return;
    }
    unset($lista[$index]);
}

$frutas = [];
do {
    echo "0) Sair", PHP_EOL;
    echo "1) Listar", PHP_EOL;
    echo "2) Cadastrar", PHP_EOL;
    echo "3) Remover", PHP_EOL;

    $opcao = readline("Digte uma opcao: ");

    switch ($opcao) {
        case OPCAO_LISTAR:
            listarFrutas($frutas);
            break;
        case OPCAO_CADASTRAR:
            cadastrarFruta($frutas);
            break;
        case OPCAO_REMOVER:
            removerFruta($frutas);
            break;
        default:
            echo "Opcao nao encontrada.";
    }
} while ($opcao != 0);
