<?php
$pdo = null;

try{
    $pdo = new PDO(
        'mysql:dbname=aula06;host=localhost;charset=utf8', 
        'root', 
        '',
        [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    

    $ps = $pdo->query('SELECT descricao, preco_compra*estoque AS inventario FROM produto');
    foreach($ps as $produto){
        echo $produto['descricao'], ' ', $produto['inventario'], PHP_EOL;
    }

} catch (Exception $e) {
    die( 'Erro: ' . $e->getMessage());
}

?>