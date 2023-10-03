<?php
    $pdo = null;
    
    try {
        $pdo = new PDO('mysql:dbname=mma;host=127.0.0.1;charset=utf8', 'root', '', [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        
        // A
        $ps = $pdo->query("SELECT * FROM lutador");        
        foreach($ps as $lutador){
            echo "Nome: " . $lutador['nome'], " ", "Peso em Kg: " . $lutador['peso_em_quilos'], " ", "Altura em metros: " . $lutador['altura_em_metros'], PHP_EOL;
        }        
        
        // B
        $ps2 = $pdo->query('SELECT COUNT(id) AS total, AVG(altura_em_metros) AS mediaAltura, MAX(altura_em_metros) AS maiorAltura, MAX(peso_em_quilos) AS maiorPeso FROM lutador');
        
        foreach($ps2 as $info){
            echo "Numero total de lutadores: " . $info['total'], PHP_EOL;
            echo "Media das alturas: " . $info['mediaAltura'], PHP_EOL;
            echo "Maior altura: " . $info['maiorAltura'], PHP_EOL;
            echo "Maior peso: " . $info['maiorPeso'], PHP_EOL;
        }

    } catch(PDOException $e){
        die("Erro: " . $e->getMessage());
    }
?>