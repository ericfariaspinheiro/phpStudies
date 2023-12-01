<?php
    namespace acme;
    require_once 'fornecedor.php';

    class RepositorioException extends \RuntimeException{}

    interface RepositorioFornecedor {
        function todos(string $filtro = '');
        function cadastrar(Fornecedor $fornecedor);
        function atualizar(Fornecedor $fornecedor);
        function remover(string $idOuCodigo);
    }
?>

