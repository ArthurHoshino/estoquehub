<?php
require_once("./db/db.php");

// Lista migrations já aplicadas
$applied = $conn->query("SELECT migration FROM migrations")->fetchAll(PDO::FETCH_COLUMN);

// Lista arquivos da migration
$files = glob(__DIR__ . "/migrations/*.php");
sort($files);

foreach ($files as $file) {
    $migration = basename($file);

    if (!in_array($migration, $applied)) {
        try {
            require_once $file;
            $className = substr(basename($file, '.php'), 4);
            $migra = new $className();
            $migra->up($conn);

            $stmt = $conn->prepare("INSERT INTO migrations (migration, applied_at) VALUES (:migration, NOW())");

            $stmt->bindParam(":migration", $migration);

            $stmt->execute();
            echo "Applied: $migration\n";
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
}
