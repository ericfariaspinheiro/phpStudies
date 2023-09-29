<?php 
    require_once 'conexao.php';

    $pdo = null;
    $descricao = readline('Descrição da tarefa a pesquisar: ');

    try {
        $pdo = conectar();
        
        $ps = $pdo->prepare('SELECT descricao, feita FROM tarefa WHERE descricao LIKE ? ');
        $ps->execute(["%". $descricao . "%"]);
        
        $tarefas = $ps->fetchAll();
        
        foreach($tarefas as $tarefa){
            echo $tarefa['descricao'], ' ', $tarefa['feita'], PHP_EOL;
        }

    } catch (PDOException $e) {
        die ('Erro: ' . $e->getMessage());
    }

?>