<?php 
    require_once 'conexao.php';

    $pdo = null;
    $idRemover = readline('ID do produto a ser removido: ');

    try {
        $pdo = conectar();
        
        $ps = $pdo->prepare('DELETE FROM tarefa WHERE tarefa.id=(?)');
        $ps->execute([$idRemover]);
        echo 'Removido com sucesso';
    } catch (PDOException $e) {
        die ('Erro: ' . $e->getMessage());
    }

?>