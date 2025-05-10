<?php

class CreateCargoTable {
    function up($pdo) {
        $pdo->exec("
            CREATE TABLE CDCARGO (
                CDCARID INT UNSIGNED AUTO_INCREMENT,
                CDCARNOME VARCHAR(200) NOT NULL,

                PRIMARY KEY (CDCARID)
            )
        ");
    }

    function down($pdo) {
        $pdo->exec("DROP TABLE CDCARGO");
    }
}
