<?php
// Crie um menu com as opções abaixo, que devem ser exibidas
// sempre que o usuário não digitar uma das opções indicadas:
//   MENU: 0) Sair  1) Listar  2) Cadastrar
// Solicite do usuário a opção desejada. Caso a escolha seja
// "1", liste todas as frutas existentes, com seus índices.
// Se "2", solicite uma fruta e a inclua no array de frutas.

const OPCAO_LISTAR = '1';
const OPCAO_CADASTRAR = '2';


function listarFrutas($lista)
{
    print_r($lista);
}

function cadastrarFruta($lista)
{
    $novaFruta = readline("Digte o nome da fruta: ");
    $lista[] = $novaFruta;
    print_r($lista);
}

$frutas = ['Banana', 'Maçã', 'Abacate'];
do {
    echo "0) Sair", PHP_EOL;
    echo "1) Listar", PHP_EOL;
    echo "2) Cadastrar", PHP_EOL;

    $opcao = readline("Digte uma opcao: ");

    switch ($opcao) {
        case OPCAO_LISTAR:
            listarFrutas($frutas);
            break;
        case OPCAO_CADASTRAR:
            cadastrarFruta($frutas);
            break;
        default:
            echo "Opcao nao encontrada.";
    }
} while ($opcao != 0);
