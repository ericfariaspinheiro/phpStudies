<?php 
    function conectar(){
        return $pdo = new PDO( 
            'mysql:dbname=acme;host=127.0.0.1;charset=utf8',
            'root', 
            '', 
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
?>