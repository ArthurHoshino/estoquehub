<?php
require_once("./db/db.php");

// Pega a última migration aplicada
$migration = $conn->query("SELECT migration FROM migrations ORDER BY id DESC LIMIT 1")->fetchColumn();

if ($migration) {
    try {
        require __DIR__ . "/migrations/$migration";
        $className = substr(basename($migration, '.php'), 4);
        $migra = new $className();
        $migra->down($conn);

        $stmt = $conn->prepare("DELETE FROM migrations WHERE migration = :migration");

        $stmt->bindParam(":migration", $migration);

        $stmt->execute();

        echo "Reverted: $migration\n";
    } catch (Exception $ex) {
        $ex->getMessage();
    }
}