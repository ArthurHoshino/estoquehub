<?php

class CreateSessionTable {
    function up($pdo) {
        $pdo->exec("
            CREATE TABLE SESSION(
                SESSIONID INT,
                SESDTCREATE DATETIME NOT NULL,
                SESUSUARIOID INT UNSIGNED,

                PRIMARY KEY (SESSIONID),
                FOREIGN KEY (SESUSUARIOID) REFERENCES CDUSUARIO(CDUSID)
            )
        ");
    }

    function down($pdo) {
        $pdo->exec("DROP TABLE SESSION");
    }
}
