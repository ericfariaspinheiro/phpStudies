<?php
    header('Content-Type: text/plain');

    $name = $_GET['name'];
    $phone = $_GET['phone'];

    echo 'Nome: ' . $name  . '\n';
    echo 'Telefone: ' . $phone  . '\n';
?>