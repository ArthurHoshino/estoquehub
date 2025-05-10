<?php
require_once("./db/db.php");

$conn->exec("
CREATE TABLE migrations(
    id INT UNSIGNED AUTO_INCREMENT,
    migration VARCHAR(255) NOT NULL,
    applied_at DATETIME NOT NULL,

    PRIMARY KEY (id)
)");