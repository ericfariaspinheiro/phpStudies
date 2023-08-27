<?php
// Adicione ao programa uma opção para alterar uma fruta.
// A nova fruta deve ocupar o mesmo índice do array.

const OPCAO_LISTAR = '1';
const OPCAO_CADASTRAR = '2';
const OPCAO_REMOVER = '3';
const OPCAO_ALTERAR = '4';


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

function alterarFruta(&$lista)
{
    $alterarFruta = readline("Digte o nome da fruta a ser alterada: ");
    $index = array_search($alterarFruta, $lista);
    if ($index === false) {
        echo "Fruta nao encontrada.";
        return;
    }

    $novaFruta = readline("Digte o nome da nova fruta: ");
    $lista[$index] = $novaFruta;
}

$frutas = [];
do {
    echo "0) Sair", PHP_EOL;
    echo "1) Listar", PHP_EOL;
    echo "2) Cadastrar", PHP_EOL;
    echo "3) Remover", PHP_EOL;
    echo "4) Alterar", PHP_EOL;

    $opcao = readline("Digte uma opcao: ");

    switch ($opcao) {
        case OPCAO_LISTAR:
            listarFrutas($frutas);
            break;
        case OPCAO_CADASTRAR:
            cadastrarFruta($frutas);
            break;
        case OPCAO_REMOVER:
        case OPCAO_ALTERAR:
            alterarFruta($frutas);
            break;
        default:
            echo "Opcao nao encontrada.";
    }
} while ($opcao != 0);
