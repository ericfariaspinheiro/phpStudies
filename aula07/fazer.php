<?php 
    require_once 'conexao.php';

    $pdo = null;
    $idFeito = readline('ID do produto a ser feito: ');

    try {
        $pdo = conectar();
        
        $ps = $pdo->prepare('UPDATE tarefa SET tarefa.feita = NOT tarefa.feita WHERE id=(?)');
        $ps->execute([$idFeito]);
        echo 'Feito com sucesso';
    } catch (PDOException $e) {
        die ('Erro: ' . $e->getMessage());
    }

?>