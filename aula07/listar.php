<?php
    require_once 'conexao.php';

    $pdo = null;
    try {
        $pdo = conectar();

        $tarefas = $pdo->query('SELECT descricao, feita FROM tarefa');
        
        foreach($tarefas as $tarefa){
            echo $tarefa['descricao'], ' ', $tarefa['feita'], PHP_EOL;
        }

    } catch (PDOException $e) {
        die('Falha ao conectar: ' . $e->getMessage());
    }
?>