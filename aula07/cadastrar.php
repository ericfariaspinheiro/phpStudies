<?php 
    require_once 'conexao.php';

    $pdo = null;

    $descricao = readline('Descricao: ');
    $feita = readline('Feita (S/N): ' ) === 'S' ? 1 : 0; 
    try {
        $pdo = conectar();

        $ps = $pdo->prepare('INSERT INTO tarefa (descricao, feita) VALUES (?,?)');
        $ps->execute([$descricao, $feita]);
        echo 'Inserido com sucesso';
    } catch (PDOException $e) {
        die ('Erro: ' . $e->getMessage());
    }
?>