<?php

$db_name = "estoquehub";
$db_host = "localhost";
$db_user = "root";
$db_pass = "";

try {
    $conn = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);
} catch (Exception $ex) {
    try {
        $pdo = new PDO("mysql:host=$db_host", $db_user, $db_pass);
        $pdo->exec("CREATE DATABASE $db_name");

        $conn = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);

        echo "Banco de dados criado com sucesso!";
    } catch (Exception $ex) {
        echo "Erro ao criar o banco de dados: " . $ex->getMessage();
    }
}

// Habilitar erros PDO
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);