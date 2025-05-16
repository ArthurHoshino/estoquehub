<?php

class CreateUsuarioTable {
    function up($pdo) {
        $pdo->exec("
            CREATE TABLE CDUSUARIO (
                CDUSID INT UNSIGNED AUTO_INCREMENT,
                CDUSNOME VARCHAR(100) NOT NULL,
                CDUSEMAIL VARCHAR(100) NOT NULL,
                CDUSCEL VARCHAR(20),
                CDUSSENHA VARCHAR(60) NOT NULL,
                CDUSTOKEN VARCHAR(60),

                PRIMARY KEY (CDUSID)
            )
        ");
    }

    function down($pdo) {
        $pdo->exec("DROP TABLE CDUSUARIO");
    }
}
