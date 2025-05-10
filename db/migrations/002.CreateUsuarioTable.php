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
                CDUSCARGOID INT UNSIGNED,
                CDUSTOKEN VARCHAR(60),

                PRIMARY KEY (CDUSID),
                FOREIGN KEY (CDUSCARGOID) REFERENCES CDCARGO(CDCARID)
            )
        ");
    }

    function down($pdo) {
        $pdo->exec("DROP TABLE CDUSUARIO");
    }
}
